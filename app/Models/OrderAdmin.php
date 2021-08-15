<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAdmin extends Model
{
    //  this model is a clone of order model but with voyager admin's policies
    //  due to conflicts between custom policies and voyager policies
    use HasFactory;
    protected $table='orders';
    public function details()
    {
        return $this->hasMany(OrderDetails::class,'order_id');
    }
}
