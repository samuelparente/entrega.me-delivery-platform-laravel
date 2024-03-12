<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
    'company_id',
    'name',
    'description',
    'category',
    'type',
    'brand',
    'model_number',
    'upc',
    'sku',
    'stock',
    'price',
    'tax',
    'shipping',
    'weight',
    'color',
    'dimensions',
    'material',
    'warranty',
    'features',
    'image',
    'active',
    ];

}
