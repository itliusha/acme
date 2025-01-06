<?php
/**
 * @author liusha <itliusha@qq.com>
 * @date 2025/1/5
 * @description
 */

namespace Itliusha\Acme\Assets;

class AssetManager
{
    protected array $styles = [];
    protected array $scripts = [];

    public function register($assets)
    {
        foreach ($assets as $asset) {
            match (true) {
                $asset instanceof CssAsset => $this->registerCss($asset),
                $asset instanceof JsAsset => $this->registerJs($asset),
                default => throw new \Exception('Asset type error'),
            };
        }
    }

}