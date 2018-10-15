<?php

namespace Tightenco\NovaPackageDiscovery\Http\Controllers;

use Zttp\Zttp;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;

class RecentPackagesController extends Controller
{
    public function __invoke()
    {
        $data = Cache::remember('tightenco-nova-packages::recent', 60, function () {
            $response = Zttp::get('https://novapackages.com/api/recent');
            return $response->json()['data'];
        });

        return response()->json($data);
    }
}
