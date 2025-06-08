<?php

namespace App\Models;

use App\Models\Traits\NameTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bank extends Model
{
    use NameTrait;

    protected $table = 'banks';
    protected $primaryKey = 'id';

    protected $fillable = [
      'name'
    ];

    public function accounts(): HasMany
    {
        return $this->hasMany(Accounts::class);
    }
}
