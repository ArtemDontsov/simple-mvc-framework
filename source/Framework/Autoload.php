<?php namespace Framework;

class Autoload{
    static $library = array();

    static function add($name, $library)
    {
        Autoload::$library[$name] = $library;
    }
}