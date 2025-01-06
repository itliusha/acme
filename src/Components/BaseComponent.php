<?php
/**
 * @author liusha <itliusha@qq.com>
 * @date 2024/12/27
 * @description
 */

namespace Itliusha\Acme\Components;

abstract class BaseComponent extends \Illuminate\View\Component
{
    protected static array $assets = [];

    /**
     * 获取静态资源数组
     * @return array 静态资源数组
     */
    public static function assets(): array
    {
        return static::$assets;
    }
}
