<?php

namespace App\Models\Enums;
enum SubscriptionFrequency: string
{
    case DAILY = 'daily';
    case WEEKLY = 'weekly';
    case MONTHLY = 'monthly';
    case YEARLY = 'yearly';

    public function getLabel(): string
    {
        return match ($this ) {
            self::DAILY => 'Diaramente',
            self::WEEKLY => 'Semanal',
            self::MONTHLY => 'Mensual',
            self::YEARLY => 'Anual',
        };
    }
}
