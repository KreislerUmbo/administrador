<?php

namespace App\Enums;

enum OrderStatus: int
{
    case Pending = 1;
    case Processing = 2;
    case Shipped = 3; 
    case Completed = 4;
    case Cancelled = 5;
    case Failed = 6; //cuando el cliente no esta
    case Refunded = 7;//reintegrado cuando se regresa
}
