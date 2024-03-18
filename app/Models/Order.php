<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['order_date', 'user_id', 'total_price', 'status'];
    // Order has many OrderItems
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }


    // Orders belong to many Products (through OrderItem)
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items')->withPivot(['quantity', 'price_at_purchase']);
    }

    // public function products()
    // {
    //     return $this->belongsToMany(Product::class)->withPivot('quantity');
    // }

    // Order has one GuestOrder
    public function guestOrder()
    {
        return $this->hasOne(GuestOrder::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
