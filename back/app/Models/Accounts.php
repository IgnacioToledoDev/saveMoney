<?php

namespace App\Models;

use App\Models\Enums\CardType;
use App\Models\Traits\NameTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Accounts extends Model
{
    use NameTrait;

    protected $table = 'accounts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'expiration_date',
        'has_reminder',
        'type',
        'has_credit_line',
        'credit_line_limit',
        'created_at',
        'updated_at',
        'balance',
        'bank_id'
    ];

    protected function casts(): array
    {
        return [
            'has_credit_line' => 'boolean',
            'has_reminder' => 'boolean',
            'expiration_date' => 'datetime:m-Y',
            'category' => CardType::class,
            'balance' => 'float',
            'bank_id' => 'integer',
        ];
    }

    protected function accountsUsers(): HasMany
    {
        return $this->hasMany(AccountsUsers::class, 'account_id', 'id');
    }

    protected function banks(): BelongsTo
    {
        return $this->belongsTo(Bank::class, 'bank_id', 'id');
    }
}
