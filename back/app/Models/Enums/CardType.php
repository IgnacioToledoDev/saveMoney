<?php

namespace App\Models\Enums;
enum CardType: string
{
    case Debit = 'debit';
    case Credit = 'credit';

    public function getLabel(): string
    {
        return match ($this) {
            self::Debit => "Debito",
            self::Credit => 'Credito',
        };
    }
}
