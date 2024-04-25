<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * enum RoleEnum
 */
enum RoleEnum: string
{
    case ADMIN     = 'Administrador';
    case MEMBER    = 'Miembro';
    case LIBRARIAN = "Bibliotecario";
    case ASSISTANT_LIBRARIAN = "Asistente de Bibliotecario";
}

//$randomRole = RoleEnum::cases()[array_rand(RoleEnum::cases())];
