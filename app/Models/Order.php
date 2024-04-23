<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public static function getTotalSale(){
        $total = Order::where('status', 0)->sum('amount');
        return $total;
    }
}
