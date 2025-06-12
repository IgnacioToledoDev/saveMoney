<?php

namespace App\Models\Enums;

enum AvailableLanguages: string
{
    case ES = 'es_CL';
    case EN = 'en_US';

    public function getLabels(): string
    {
        return match ($this) {
            self::ES => 'Español',
            self::EN => 'Ingles',
        };
    }
}
