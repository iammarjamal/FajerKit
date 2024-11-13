<?php

namespace Iammarjamal\FajerKit;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Iammarjamal\FajerKit\Commands\FajerKitCommand;

class FajerKitServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('fajerkit')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_fajerkit_table')
            ->hasCommand(FajerKitCommand::class);
    }
}
