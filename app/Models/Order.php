<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['order_date'];
    // Order has many OrderItems
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }


    // Orders belong to many Products (through OrderItem)
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items');
    }

    // Order has one GuestOrder
    public function guestOrder()
    {
        return $this->hasOne(GuestOrder::class);
    }
}
