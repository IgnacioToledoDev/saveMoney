<?php

namespace App\Models;


use App\Models\Enums\Category;
use App\Models\Enums\Priority;
use App\Models\Traits\NameTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Goal extends Model
{
    use NameTrait;

    public const TYPE = 'goal';

    protected $fillable = [
        'name',
        'category',
        'goal_amount',
        'init_amount',
        'target_date',
        'priority',
        'description',
        'has_reminder',
        'created_at',
        'updated_at',
        'user_id',
        'account_id'
    ];

    protected function casts(): array
    {
        return [
            'has_reminder' => 'boolean',
            'priority' => Priority::class,
            'category' => Category::class,
            'target_date' => 'datetime:Y-m-d',
        ];
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function accounts(): HasMany
    {
        return $this->HasMany(Accounts::class, 'account_id');
    }

    protected function targetDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value->format('d-m-Y'),
            set: fn ($value) => $value->format('Y-m-d')
        );
    }
}
