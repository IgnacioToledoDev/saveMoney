<?php

namespace App\Models;

use App\Models\Traits\NameTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bank extends Model
{
    use NameTrait;

    protected $table = 'banks';
    protected $primaryKey = 'id';

    protected $fillable = [
      'name'
    ];

    public function cards(): BelongsTo
    {
        return $this->belongsTo(Card::class, 'bank_id', 'id');
    }
}
