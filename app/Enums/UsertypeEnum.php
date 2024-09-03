<?php

namespace App\Enums;

enum UsertypeEnum:string
{
    case ADMIN = 'admin';
    case USER = 'user';
    case GUEST = 'guest';
}
