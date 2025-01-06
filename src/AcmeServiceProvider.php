<?php

namespace Itliusha\Acme;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Itliusha\Acme\Console\PublishCommand;
use Itliusha\Acme\Facades\Acme as AcmeFacade;

class AcmeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->alias(Acme::class, 'acme');

        $this->app->singleton(Acme::class, function ($app) {
            return new Acme($app);
        });

        (AliasLoader::getInstance())->alias('Acme', AcmeFacade::class);
    }

    public function boot(): void
    {
        $this->bootComponentPath();
        $this->bootTagCompiler();
        $this->bootDirectives();

        $this->publishCommands();
    }

    protected function bootComponentPath(): void
    {
        Blade::anonymousComponentPath(resource_path('views/acme'), 'acme');
    }

    public function bootTagCompiler(): void
    {
        $compiler = new AcmeTagCompiler(
            app('blade.compiler')->getClassComponentAliases(),
            app('blade.compiler')->getClassComponentNamespaces(),
            app('blade.compiler')
        );

        app()->bind('acme.compiler', function () use ($compiler) { return $compiler; });

        app('blade.compiler')->precompiler(function ($value) use ($compiler) {
            return $compiler->compile($value);
        });
    }

    private function bootDirectives(): void
    {
        Blade::directive('acmeStyles', function ($expression) {
            return "<?php echo app('acme')->renderStyles($expression) ?>";
        });

        Blade::directive('acmeScripts', function ($expression) {
            return "<?php echo app('acme')->renderScripts($expression); ?>";
        });
    }

    private function publishCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                PublishCommand::class,
            ]);
        }
    }
}
