<?php

namespace Tightenco\NovaPackageDiscovery\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class StatsController extends Controller
{
    public function __invoke()
    {
        $data = Cache::remember('tightenco-nova-packages::stats', 60, function () {
            $response = Http::get('https://novapackages.com/api/stats');
            return $response->json();
        });

        return response()->json($data);
    }
}
