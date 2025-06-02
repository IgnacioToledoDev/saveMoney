<?php

namespace App\Models;

use App\Models\Enums\CardType;
use App\Models\Traits\NameTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Card extends Model
{
    use NameTrait;

    protected $table = 'cards';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'expiration_date',
        'has_reminder',
        'type',
        'has_credit_line',
        'credit_line_limit',
        'user_id',
        'created_at',
        'updated_at',
    ];

    protected function casts(): array
    {
        return [
            'has_credit_line' => 'boolean',
            'has_reminder' => 'integer',
            'expiration_date' => 'datetime:m-Y',
            'category' => CardType::class,
        ];
    }

    protected function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
