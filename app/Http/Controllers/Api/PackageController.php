<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = package::all();
        return response()->json([
            'message' => 'A message from the API',
            'success' => True,
            'data' => $packages
        ]);
    }
    
}
