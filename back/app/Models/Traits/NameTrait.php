<?php

namespace App\Models\Traits;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * Trait to transform the `name` attribute:
 * - When getting: returns it in title case.
 * - When setting: stores it in lowercase.
 */
trait NameTrait {
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => is_string($value) ? ucwords($value) : $value,
            set: fn ($value) => is_string($value) ? strtolower($value) : $value
        );
    }
}
