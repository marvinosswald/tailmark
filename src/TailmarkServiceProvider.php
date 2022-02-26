<?php

namespace Marvinosswald\Tailmark;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Marvinosswald\Tailmark\Commands\TailmarkCommand;

class TailmarkServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('tailmark')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_tailmark_table')
            ->hasCommand(TailmarkCommand::class);
    }
}
