<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'stripe_plan',
        'price',
        'stock',
        'low_stock',
        'status',
    ];
}
