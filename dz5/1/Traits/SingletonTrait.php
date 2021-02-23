<?php

namespace Traits;

trait SingletonTrait
{
    /**
     * @var array список объектов
     */
    private static $instances = [];

    /**
     * @return self
     */
    public static function single()
    {
        if (!isset(self::$instances[static::class])) {
            self::$instances[static::class] = new static;
        }

        return self::$instances[static::class];
    }
}