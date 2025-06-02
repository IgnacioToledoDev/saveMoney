<?php

namespace App\Models;

use App\Models\Enums\Category;
use App\Models\Enums\TransactionType;
use App\Models\Traits\NameTrait;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use NameTrait;

    public const TYPE = 'transaction';

    protected $table = 'transactions';
    protected $fillable = [
        'name',
        'category',
        'amount',
        'type',
        'is_recurrent',
        'created_at',
        'updated_at',
    ];

    protected function casts(): array
    {
        return [
            'is_recurrent' => 'boolean',
            'type' => TransactionType::class,
            'category' => Category::class,
            'amount' => 'float',
        ];
    }
}
