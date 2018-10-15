<?php

namespace Tightenco\NovaPackageDiscovery\Http\Controllers;

use Zttp\Zttp;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

class StatsController extends Controller
{
    public function __invoke()
    {
        $data = Cache::remember('tightenco-nova-packages::stats', 60, function () {
            $response = Zttp::get('https://novapackages.com/api/stats');
            return $response->json();
        });

        return response()->json($data);
    }
}
