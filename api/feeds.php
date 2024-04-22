<?php

use Facades\Control\FeedControl;

FeedControl::handle($request, $response);



function sample_timestamps($count) {
    $result = [];

    $time = time();

    for ($i=0; $i < $count; $i++)
        $result[] = $time + $i * 60;

    return $result;
}

function load_timestamps(&$out) {
    $content = @file_get_contents(TIMESTAMP_CACHE_PATH);
    if (empty($content))
        return false;

    try {
        $data = json_decode($content);
        if (!is_array($data))
            return false;

        for ($i=0; $i < count($data); $i++) 
            array_push($out, $data[$i]);

    } catch (Exception $err) {
        return false;
    }

    return true;
}

function get_timestamps() {

    $timestamps = [];

    if (file_exists(TIMESTAMP_CACHE_PATH))
        load_timestamps($timestamps);
    
    if (count($timestamps) < 1) {
        $timestamps = sample_timestamps(500);
        json_dumb($timestamps, TIMESTAMP_CACHE_PATH);
    }

    return $timestamps;
}

function json_dumb($data, $path) {
    if (file_exists($path))
        @unlink($path);

    $serialized = @json_encode($data);

    @file_put_contents($path, $serialized);
    return true;
}

function genRandomFeeds($count, $nameTable, $descTable) {
    $timestamps = get_timestamps();

    $result = [];

    for ($i = 0; $i < $count; ++$i)
        $result[] = [
            "id"          => $i, 
            "name"        => $nameTable[rand(0, count($nameTable) - 1)],
            "description" => $descTable[rand(0, count($descTable) - 1)],
            "image_url"   => 'https://picsum.photos/300/300',
            "timestamp"   => $timestamps[rand(0, count($timestamps) - 1)],
        ];

    return $result;
}

function reqReadBody() {
    $input = @file_get_contents("php://input");
    if (!$input)
        return null;

    try {
        $result = json_decode($input);
        return $result;
    } catch(Exception $err) {
    
    }

    return null;
}



$feeds = FeedsModel::fetchSessionFeeds();

$feeds = Collection::from(genRandomFeeds(43, $nameTable, $descTable));

$feeds
    ->filter(fn($feed) => $feed['timestamp'] < $sessionInitTime)
    ->sort(Collection::SORT_ASC);


echo     json_encode($feeds);