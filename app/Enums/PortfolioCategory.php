<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum PortfolioCategory: string implements HasLabel
{
    case WEDDING = 'Wedding';
    case PREWEDDING = 'Prewedding';
    case ENGAGEMENT = 'Engagement';
    case CINEMATIC = 'Cinematic Video';

    public function getLabel(): ?string
    {
        return $this->name;
    }
}