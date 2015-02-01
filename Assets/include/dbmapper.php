<?php

class DBMapper {
    public static $database;

    public static function init ($database) {
        static::$database = $database;
    }
}

?>
