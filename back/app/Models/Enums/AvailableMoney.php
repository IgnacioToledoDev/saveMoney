<?php

namespace App\Models\Enums;

enum AvailableMoney: string
{
    case CLP = 'clp';
    case EUR = 'eur';
    case USD = 'usd';

    public function getLabels(): string
    {
        return match ($this) {
            self::CLP => 'CLP',
            self::EUR => 'EUR',
            self::USD => 'USD',
        };
    }
}
