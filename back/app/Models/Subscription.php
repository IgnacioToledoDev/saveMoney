<?php

namespace App\Models;

use App\Models\Traits\NameTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    use NameTrait;

    protected $fillable = [
        'name',
        'amount',
        'category',
        'description',
        'has_reminder',
        'reminder_send_at',
        'type',
        'frequency',
        'start_date',
        'end_date',
        'is_active',
        'is_shared',
        'payment_method',
        'facture_day',
        'account_id',
        'user_id'
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'amount' => 'float',
            'start_date' => 'date:Y-m-d',
            'end_date' => 'date:Y-m-d',
        ];
    }

    public function account(): BelongsTo {
        return $this->belongsTo(Accounts::class, 'account_id');
    }
    public function users(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }
}
