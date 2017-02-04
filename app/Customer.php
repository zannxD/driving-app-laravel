<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $fillable = [
    'id',
    'fullname',
    'nic',
    'date_of_admission',
    'total_price',
    'address',
    'phone1',
    'phone2',
    'status',
    'remarks',
    'regno',
    'vehicles'
  ];
  public function payments(){
    return $this->hasMany('App\Payment');
  }
  public function exams(){
    return $this->hasMany('App\Exam');
  }
}
