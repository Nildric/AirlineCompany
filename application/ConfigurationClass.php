<?php

class ConfigurationClass {
    private static $configuration;

    public static function getConfiguration() {
        self::$configuration = json_decode(file_get_contents(__DIR__ . "/ConfigurationJSON.json"), TRUE);
    return self::$configuration;
    }
}