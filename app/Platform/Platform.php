<?php

namespace App\Platform;

class Platform
{
    public static $platforms = [];

    public static function hasPlatforms()
    {
        return count(static::$platforms) > 0;
    }

    public static function findPlatform(string $key)
    {
        return static::$platforms[$key] ?? null;
    }

    public static function platform(string $key, string $name)
    {
        static::$platforms[$key] = $name;
    }
}