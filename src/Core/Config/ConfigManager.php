<?php

namespace Core\Config;
use Core\Application\ServerService;
use Core\Filesystem\Filesystem;
use Core\Utils\Misc\VarDumper;


class ConfigManager extends ServerService {

    const DEFAULT_CONFIG = [
        "entry-point" => "src/App.php"
    ];

    protected $configMap;

    protected $projectConfig;

    protected $userConfigFilePath;

    public function init() {
        $this->configMap = [];
        
        $this->merge($this->getContext()->getConfig());
        
        $this->fetchUserConfig();
        $this->loadConfig();
    }
    
    public function fetchUserConfig() {
        $projectPath = $this->value("project-path");
        if (!$projectPath)
            throw new \Exception("Couldn't locate project path.");

        $this->userConfigFilePath = $projectPath . "/config.php";
    }

    public function loadConfig() {
        $this->projectConfig = [];

        if (!Filesystem::fileExists($this->userConfigFilePath))
            $this->createConfigFile();

        $projectConfig = (fn($configPath) => require $configPath)($this->userConfigFilePath);

        var_dump($projectConfig);
    }

    public function createConfigFile() {
        if (Filesystem::fileExists($this->userConfigFilePath))
            return false;

        Filesystem::writeFile($this->userConfigFilePath, [
            "<?php\n\n",
            "return ", 
            VarDumper::dumpArray(self::DEFAULT_CONFIG)
        ]);
    }



    public function merge($config) {
        $this->configMap = array_merge($config, $this->configMap);
    }

    public function value($key, $default = null) {
        if (array_key_exists($key, $this->configMap))
            return $this->configMap[$key];

        return $default;
    }

    public function needsInit(): bool {
        return true;
    }
};