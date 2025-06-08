<?php

namespace App\Models\Enums;
enum    CardType: string
{
    case DEBIT = 'debit';
    case CREDIT = 'credit';
    case CASH = 'cash';
    case BANK_ACCOUNT = 'bank_account';
    case DIGITAL_WALLET = 'digital_wallet';

    public function getLabel(): string
    {
        return match ($this) {
            self::DEBIT => "Debito",
            self::CREDIT => 'Credito',
            self::CASH => 'Efectivo',
            self::BANK_ACCOUNT => 'Cuanta Bancaria',
            self::DIGITAL_WALLET => 'Billetera digital',
        };
    }
}
