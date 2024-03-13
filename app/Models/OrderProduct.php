<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table = 'order_product';

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
    ];

    // Relacionamento com o modelo Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relacionamento com o modelo Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
