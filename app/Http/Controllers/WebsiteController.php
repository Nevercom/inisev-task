<?php

namespace App\Http\Controllers;

use App\Models\Website;

class WebsiteController extends Controller
{
    public function index()
    {
        return response()->json([
            'websites' => Website::all(),
        ]);
    }
}
