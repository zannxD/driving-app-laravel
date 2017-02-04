<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
  protected $fillable=[
    'id',
    'customer_id',
    'description',
    'type',
    'amount',
    'date',
    'billno',
    'stamp'
  ];

  public function customer(){
    return $this->belongsTo('App\Customer');
  }
}
