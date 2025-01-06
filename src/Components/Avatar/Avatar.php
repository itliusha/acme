<?php
/**
 * @author liusha <itliusha@qq.com>
 * @date 2024/12/27
 * @description
 */

namespace Itliusha\Acme\Components\Avatar;

use Illuminate\Contracts\View\View;
use Itliusha\Acme\Components\BaseComponent;

class Avatar extends BaseComponent
{

    /**
     * 构造函数：初始化Avatar组件的属性
     *
     * @param string $type Avatar的类型，默认为'image'，可选值: image | icon | text
     * @param string $theme Avatar的主题颜色，默认为'gray'，可选值: gray | primary | success | warning |danger | subsidiary
     * @param string $shape Avatar的形状，默认为'circle'，可选值: square | circle
     * @param string $size Avatar的大小，默认为'default'，可选值: mini:24 | small:32 |  default:48 | medium:64 | Large:80 | maximum:144
     * @param bool $dot 是否显示角标，默认为false, 可选值: false | true
     * @param string $src Avatar图片的URL，默认为空字符串，当$type为'image'时有效
     * @param string $alt Avatar图片的替代文本，默认为空字符串，当$type为'image'时有效
     * @param string $text Avatar上显示的文本内容，默认为空字符串，当$type为'text'时有效
     * @param ?string $icon Avatar上显示的图标类名，可以为空，当$type为'icon'时有效
     */
    public function __construct(
        public string $type = 'image',
        public string $theme = 'gray',
        public string $shape = 'circle',
        public string $size = 'default',
        public bool $dot = false,
        public string $src = '',
        public string $alt = '',
        public string $text = '',
        public ?string $icon = null,
    )
    {

    }


    public function render(): View
    {
        return view('acme::avatar');
    }
}
