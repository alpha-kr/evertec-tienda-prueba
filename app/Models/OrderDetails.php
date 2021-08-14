<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $fillable =[
        'product_id',
        'quantity',
        'order_id',
        'price'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
