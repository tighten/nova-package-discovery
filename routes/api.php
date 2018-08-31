<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Zttp\Zttp;

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

Route::get('recent-packages', function (Request $request) {
    $data = Cache::remember('tightenco-nova-packages::recent', 60, function () {
        $response = Zttp::get('https://novapackages.com/api/recent');
        return $response->json()['data'];
    });

    return response()->json($data);
});

Route::get('popular-packages', function (Request $request) {
    $data = Cache::remember('tightenco-nova-packages::popular', 60, function () {
        $response = Zttp::get('https://novapackages.com/api/popular');
        return $response->json()['data'];
    });

    return response()->json($data);
});

Route::get('stats', function (Request $request) {
    $data = Cache::remember('tightenco-nova-packages::stats', 60, function () {
        $response = Zttp::get('https://novapackages.com/api/stats');
        return $response->json();
    });

    return response()->json($data);
});
