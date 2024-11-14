<?php

namespace Itliusha\QuicksandBladeUi;

use Itliusha\QuicksandBladeUi\Console\PublishCommand;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Package;

class QuicksandBladeUiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {

        $package
            ->name('quicksand-blade-ui')
            ->hasConfigFile()
            ->hasViews()
            ->hasCommands([
                PublishCommand::class
            ]);
    }
}
