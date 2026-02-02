<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Setting;

class PortfolioController extends Controller
{
    /**
     * Display the specified portfolio.
     */
    public function show(Portfolio $portfolio)
    {
        $setting = Setting::first();
        
        return view('portfolio.detail', compact('portfolio', 'setting'));
    }
}
