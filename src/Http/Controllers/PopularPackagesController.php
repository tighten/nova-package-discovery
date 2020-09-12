<?php

namespace Tightenco\NovaPackageDiscovery\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class PopularPackagesController extends Controller
{
    public function __invoke()
    {
        $data = Cache::remember('tightenco-nova-packages::popular', 60, function () {
            $response = Http::get('https://novapackages.com/api/popular');
            return $response->json()['data'];
        });

        return response()->json($data);
    }
}
