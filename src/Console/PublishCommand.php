<?php

namespace Itliusha\Acme\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class PublishCommand extends Command
{
    protected $signature = 'acme:publish { component }
                                {--view : Publish only the view of the component \<仅发布组件的视图文件\>}
                                {--class : Publish only the class of the component \<仅发布组件的类文件\>}
                                {--force : Overwrite existing files \<覆盖已存在的文件\>}';

    protected $description = 'Publish the Acme component\'s views and classes. \<发布Acme组件的视图和类文件\>';

    public function handle(Filesystem $filesystem): void
    {
        $components = config('acme.components');
        $alias = $this->argument('component');

        $component = $components[$alias] ?? null;
        if (!$component) {
            $this->error("[$alias] component not found. \<组件未找到\>");
            return;
        }

        $class = str_replace('Itliusha\\Acme\\Components\\', '/', $component['class']);
    }

}
