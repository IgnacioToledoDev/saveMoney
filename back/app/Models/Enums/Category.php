<?php

namespace App\Models\Enums;

use App\Models\Goal;
use App\Models\Transaction;

enum Category: string {
    // Income-related
    case SALARY = 'salary';
    case GIFT = 'gift';

    // Expense-related
    case GROCERIES = 'groceries';
    case RENT = 'rent';

    // Goal-related
    case SAVE_CAR = 'save_car';
    case SAVE_HOUSE = 'save_house';

    public static function optionsFor(string $context, string $type): array
    {
        return match ($context) {
            Transaction::TYPE => match ($type) {
                TransactionType::INCOME->value => [self::SALARY, self::GIFT],
                TransactionType::EXPENSE->value => [self::GROCERIES, self::RENT],
                default => [],
            },
            Goal::TYPE => match ($type) {
                Goal::TYPE => [self::SAVE_CAR],
                default => [],
            },
            default => [],
        };
    }
}
