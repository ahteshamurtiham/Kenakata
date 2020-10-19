<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = [
      'payment_status', //update kortesi tai ekhane fillable kore field ta bole dilam
    ];

    function country(){
        return $this->belongsTo('App\Country', 'country_id');
    }
    function city(){
        return $this->belongsTo('App\City','city_id');
    }
}
