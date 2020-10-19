<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    function category(){
        return $this->belongsTo('App\Category','category_id');
    }
    function subcat(){
        return $this->belongsTo('App\SubCategory','subcategory_id');
    }
}
