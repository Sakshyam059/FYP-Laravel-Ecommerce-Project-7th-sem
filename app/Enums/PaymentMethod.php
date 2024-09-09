<?php

namespace App\Enums;

enum PaymentMethod:int
{
    case CASH = 0;
    case PAYMENT_GATEWAY = 1;
}

