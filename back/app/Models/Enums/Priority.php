<?php

namespace App\Models\Enums;
enum Priority: string
{
    case LOW = 'low';
    case MEDIUM = 'medium';
    case HIGH = 'high';

    public function getLabel(): string
    {
        return match ($this) {
            self::LOW => "Bajo",
            self::MEDIUM => 'Medio',
            self::HIGH => 'Alto'
        };
    }
}
