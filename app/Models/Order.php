<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'request_id',
        'user_id',
        'customer_name',
        'customer_email',
        'customer_mobile',
        'comments',
        'status',
        'total'
    ];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i',
    ];
    use HasFactory;

    public function details()
    {
        return $this->hasMany(OrderDetails::class);
    }
}
