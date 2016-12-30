<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
  protected $fillable=[
    'id',
    'customer_id',
    'date',
    'applying_date',
    'code',
    'type',
    'time',
    'status',
  ];

  public function customer(){
    return $this->belongsTo('App\Customer');
  }


}
