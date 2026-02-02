<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Setting;
use App\Enums\PortfolioCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman depan website.
     */
    public function index()
    {
        // 1. Ambil data Settings (kita ambil baris pertama)
        // Jika kosong (belum diisi), kita buat objek dummy agar tidak error
        $setting = Setting::first() ?? new Setting();

        // 2. Ambil data Portfolio
        // - with('media'): Eager loading agar query gambar cepat
        // - latest(): Urutkan dari yang terbaru
        // - get(): Eksekusi query
        $portfolios = Portfolio::with('media')
                        ->latest('project_date')
                        ->get();

        return view('welcome', compact('setting', 'portfolios'));
    }

    /**
     * Menampilkan portfolio berdasarkan kategori
     */
    public function category($category)
    {
        $setting = Setting::first() ?? new Setting();
        
        // Validasi kategori
        $validCategories = collect(PortfolioCategory::cases())->map(fn($c) => $c->value)->toArray();
        
        if (!in_array($category, $validCategories)) {
            abort(404, 'Kategori tidak ditemukan');
        }

        // Ambil portfolio berdasarkan kategori
        $portfolios = Portfolio::with('media')
                        ->where('category', $category)
                        ->latest('project_date')
                        ->get();

        return view('portfolio.category', compact('setting', 'portfolios', 'category'));
    }

    /**
     * Menampilkan halaman contact
     */
    public function contact()
    {
        $setting = Setting::first() ?? new Setting();
        
        return view('contact', compact('setting'));
    }
}