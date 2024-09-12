<?php

namespace App\Enums;

enum VerificationEnum:int
{
    case VERIFIED = 1;
    case UNVERIFIED = 0;
    case PENDING = 2;
}
