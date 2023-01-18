<?php

namespace Junholee14\MessengerHub;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Junholee14\MessengerHub\Commands\MessengerHubCommand;

class MessengerHubServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('messenger-hub')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_messenger-hub_table')
            ->hasCommand(MessengerHubCommand::class);
    }
}
