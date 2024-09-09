<?php

namespace App\Enums;

enum UsertypeEnum:string
{
    case ADMIN = 'admin';
    case VENDOR = 'vendor';
    case USER = 'customer';
}
