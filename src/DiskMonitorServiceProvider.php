<?php

namespace MostafaBozorgzade\DiskMonitor;

use Illuminate\Support\Facades\Route;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use MostafaBozorgzade\DiskMonitor\Commands\RecordDiskMetricsCommand;
use MostafaBozorgzade\DiskMonitor\Http\Controller\DiskMetricsController;

class DiskMonitorServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-disk-monitor')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_disk_monitor_table')
            ->hasCommand(RecordDiskMetricsCommand::class);
    }

    public function packageRegistered()
    {

        Route::macro('diskMonitor', function(string $baseUrl = 'diskMonitor'){

            Route::prefix($baseUrl)->group(function(){
                Route::get('/', [DiskMetricsController::class, 'index']);

            });

        });


        // in the package
        // "/diskMonitor", "/custom-route"

        // Route::example('custom-route');

    }
}
