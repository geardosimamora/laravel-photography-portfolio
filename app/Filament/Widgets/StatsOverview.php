<?php

namespace App\Filament\Widgets;

use App\Models\Portfolio;
use App\Enums\PortfolioCategory;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    // Mengatur agar widget ini refresh otomatis setiap 15 detik (opsional)
    protected static ?string $pollingInterval = '15s';

    protected function getStats(): array
    {
        return [
            // Stat 1: Total Project
            Stat::make('Total Projects', Portfolio::count())
                ->description('All uploaded portfolios')
                ->descriptionIcon('heroicon-m-camera')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17]), // Grafik dummy pemanis

            // Stat 2: Kategori Paling Sering Dipakai
            Stat::make('Top Category', function() {
                // Logika mencari kategori terbanyak
                return Portfolio::select('category')
                    ->selectRaw('count(*) as total')
                    ->groupBy('category')
                    ->orderByDesc('total')
                    ->first()
                    ?->category->value ?? '-';
            })
                ->description('Most uploaded category')
                ->descriptionIcon('heroicon-m-tag')
                ->color('primary'),

            // Stat 3: Update Terakhir
            Stat::make('Latest Update', function() {
                return Portfolio::latest('created_at')->first()?->created_at->diffForHumans() ?? '-';
            })
                ->description('Time since last upload')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
        ];
    }
}