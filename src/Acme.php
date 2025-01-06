<?php

namespace Itliusha\Acme;


use Illuminate\Support\Facades\Vite;

final class Acme
{
    private array $styles = [];

    private array $scripts = [];

    public function registerStyles(array $styles): void
    {
        $this->styles = array_merge($this->styles, $styles);
    }

    public function registerScripts(array $scripts): void
    {
        $this->scripts = array_merge($this->scripts, $scripts);
    }

    public function renderStyles(): string
    {
        return collect($this->styles)->map(function ($style) {
            return '<link rel="stylesheet" href="' . Vite::asset($style) . '">';
        })->implode(PHP_EOL);
    }


    public function renderScripts(): string
    {
        return collect($this->scripts)
            ->map(function ($script) {
            return '<script src="' . Vite::asset($script) . '"></script>';
        })->implode(PHP_EOL);
    }


    public function componentExists($name)
    {
        return app('view')->exists(md5('acme') . '::' . $name);
    }


}
