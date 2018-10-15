<?php

use Tightenco\NovaPackageDiscovery\Http\Controllers\RecentPackagesController;
use Tightenco\NovaPackageDiscovery\Http\Controllers\PopularPackagesController;
use Tightenco\NovaPackageDiscovery\Http\Controllers\StatsController;

/*
|--------------------------------------------------------------------------
| Card API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your card. These routes
| are loaded by the ServiceProvider of your card. You're free to add
| as many additional routes to this file as your card may require.
|
*/

Route::get('recent-packages', RecentPackagesController::class);
Route::get('popular-packages', PopularPackagesController::class);
Route::get('stats', StatsController::class);
