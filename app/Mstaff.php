<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mstaff extends Model
{
  public $timestamps = false;
  protected $fillable = ['division_no', 'staff_id', 'staff_name', 'officer_flag'];
}
