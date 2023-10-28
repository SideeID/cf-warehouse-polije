<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $newer = Dataset::with('user')
            ->where('valid', 1)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        $popular = Dataset::with('user')
            ->where('valid', 1)
            ->orderBy('download_count', 'desc')
            ->limit(6)
            ->get();
            
        return view('pages.utama', compact('newer', 'popular'));
    }
}
