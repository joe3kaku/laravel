<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mproduct extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['product_id', 'product_name', 'product_val'];
}
