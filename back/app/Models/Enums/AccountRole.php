<?php

namespace App\Models\Enums;

enum AccountRole: string
{
    case OWNER = 'owner';
    case COLLABORATOR = 'collaborator';

    public function getLabel()
    {
        return match ($this)
        {
            self::OWNER => 'Propietario',
            self::COLLABORATOR => 'Colaborador',
        };
    }
}
