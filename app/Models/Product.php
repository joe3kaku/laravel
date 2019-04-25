<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $connection = 'Product';
    // protected $table = 'Product.M_Product';
    protected $table = 'M_Product';
    protected $fillable = [
      Product_ID,
      Product_Name,
      Product_Val,
      insert_date
    ];
}
