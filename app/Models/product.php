<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = ('products');
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_id',
        'product_name',
        'ExpireDate',
        'company_name',
        'country_name',
        'NumberCarton',
        'NumberFiCarton',
        'Total',
        'PriceBuy',
        'PriceSell',
        'cat_id',      
  ];
}
