<?php

namespace Marvinosswald\Tailmark;

use Spatie\LaravelPackageTools\Package;
use Marvinosswald\Tailmark\View\Components\Render;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
            ->hasViewComponent('tailmark', Render::class)
            ->hasViews();
    }
}
