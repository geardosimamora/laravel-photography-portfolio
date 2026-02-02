<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Setting extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $guarded = [];

    /**
     * Get owner image from media library
     */
    public function getOwnerImageAttribute()
    {
        return $this->getFirstMediaUrl('owner_image');
    }

    /**
     * Get hero image from media library
     */
    public function getHeroImageAttribute()
    {
        return $this->getFirstMediaUrl('hero_image');
    }
}
