<?php

namespace App\Models;

use App\Enums\PortfolioCategory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Portfolio extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [
        'category' => PortfolioCategory::class,
        'project_date' => 'date',
    ];

    // Konfigurasi konversi gambar otomatis ke WebP agar website ringan
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->width(400)
              ->format('webp')
              ->nonQueued(); // Proses langsung saat upload

        $this->addMediaConversion('large')
              ->width(1200)
              ->format('webp')
              ->nonQueued();
    }
}