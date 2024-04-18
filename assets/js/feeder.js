
function modelHas(k, model, out) {
    for (const b of model) 
    {
        if (b.key == k) {
            out.result = b;
            return true;
        }
    }

    out.result = null;
    return false;
}

class JSONValidator {
    static validate(obj, model) {
        if (!obj)
            return false;

        for (const k in obj) {
            let out = {};
            if (modelHas(k, model, out) && out.result.type == typeof(obj[k]))
                return true;
        }

        return false;
    }
}

const FeedsModel = [
    {
        key: 'timestamp',
        type: 'number'
    },
    {
        key: 'feeds',
        type: 'object'
    }
];

async function http_fetch(req_desc) {
    try {            
        const res  = await fetch(req_desc.endpoint);
        
        if (res.status != 200)
            return null;

        const data = await res.json();

        if (!JSONValidator.validate(data, FeedsModel)) {
            console.warn(`Error while loading feeds: Invalid returned data. `, data);
            return null;
        }

        return data;
    } catch(err) {
        console.warn(`Error while loading feeds: `, err);
        return null;
    }
}

class Feeder {

    static FEEDER_ENDPOINT = 'http://localhost/feeds/';

    constructor(type, query) {
        this._type             = type;
        this._elementQuery     = query;
        this._renderElement    = domSelect(query);
        this._feeds            = [];
        this._initialTimestamp = -1;
    }

    async load() { 
        this.clear();
        const result = await this.getFeeds(0);
        console.log("result: ", result);
    }

    async getFeeds(chunk) {
        return await http_fetch({
            endpoint: Feeder.FEEDER_ENDPOINT + `${!chunk ? '' : chunk}`
        });
    }

    clear() {
        this._initialTimestamp = -1;
        this._feeds            = [];
    }

    get feeds() {
        return this._feeds;
    }
    
    get type() {
        return this._type;
    }
    
    get elementId() {
        return this._elementId;
    }

    static create(type, element_id) {
        return new Feeder(type, element_id);
    }
}

function domSelect(query) {
    return document.querySelector(query);
}

const feeds = Feeder.create('news', 'feeder-view');
feeds.load();