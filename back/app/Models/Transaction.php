<?php

namespace App\Models;

use App\Models\Enums\Category;
use App\Models\Enums\TransactionType;
use App\Models\Traits\NameTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'created_at',
        'updated_at',
        'account_id',
        'user_id',
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

    public function accounts(): BelongsTo {
        return $this->belongsTo(Accounts::class, 'account_id', 'id');
    }

    public function users(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
