<?php

namespace Itliusha\Acme;

use Itliusha\Acme\Console\PublishCommand;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Package;

class AcmeServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {

        $package
            ->name('acme')
            ->hasConfigFile('acme')
            ->hasViews()
            ->hasCommands([
                PublishCommand::class
            ]);
    }
}
