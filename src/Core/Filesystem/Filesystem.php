<?php

namespace Core\Filesystem;

class Filesystem {
    public static function writeFile($path, $content) {

        if (is_array($content))
            $content = implode("", $content);

        if (!@file_put_contents($path, $content))
            return false;
        return true;
    }

    public static function fileExists($path) {
        return @file_exists($path);
    }

}