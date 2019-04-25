<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// class Product extends Model
class Product extends Model
{
    // protected $connection = 'mysql';
    // protected $table = 'M_Productss';

    protected $fillable = [
      'Product_ID',
      'Product_Name',
      'Product_Val',
      'insert_date',
    ];
}
