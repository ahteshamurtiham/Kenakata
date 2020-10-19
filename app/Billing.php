<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    function product(){
        return $this->belongsTo('App\product','product_id');
    }
    function grand(){
        return $this->belongsTo('App\Sell','sale_id');
    }

}
