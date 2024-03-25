<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestOrder extends Model
{
    use HasFactory;
    protected $fillable = ["name", "email", "phone", "address", "product_requests", "order_id"];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
