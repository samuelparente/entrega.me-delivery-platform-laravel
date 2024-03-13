<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'client_id',
        'messenger_id',
        'delivery_status',
        'payment_status',
        'comments',
    ];

    public function company()
    {
        return $this->belongsTo(User::class, 'company_id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function messenger()
    {
        return $this->belongsTo(User::class, 'messenger_id');
    }

    public function products()
{
    return $this->belongsToMany(Product::class, 'order_product')->withPivot('quantity');
}

}
