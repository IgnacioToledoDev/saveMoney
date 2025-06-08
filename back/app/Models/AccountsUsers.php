<?php

namespace App\Models;

use App\Models\Enums\AccountRole;
use Illuminate\Database\Eloquent\Model;

class AccountsUsers extends Model
{
    protected $table = 'accounts_users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'account_id',
        'user_id',
        'role'
    ];

    protected function casts(): array
    {
        return [
            'account_id' => 'int',
            'user_id' => 'int',
            'role' => AccountRole::class
        ];
    }
}
