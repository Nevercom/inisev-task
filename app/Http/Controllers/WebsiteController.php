<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Support\Facades\Cache;

class WebsiteController extends Controller
{
    public function index()
    {
        return response()->json(data: [
            'websites' => Cache::remember(
                key: 'websites',
                ttl: 3600, // cache for 1 hour, should use invalidation strategy in production
                callback: fn() => Website::all()
            ),
        ]);
    }
}
