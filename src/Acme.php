<?php

namespace Itliusha\Acme;

final class Acme
{
    private static array $styles = [];

    private static array $scripts = [];


    /**
     * @return array
     */
    public static function styles(): array
    {
        return static::$styles;
    }

    /**
     * @return array
     */
    public static function scripts(): array
    {
        return static::$scripts;
    }

    /**
     * @param array $styles
     */
    public static function setStyles(array $styles): void
    {
        self::$styles = $styles;
    }



    /**
     * @param array $scripts
     */
    public static function setScripts(array $scripts): void
    {
        self::$scripts = $scripts;
    }
}
