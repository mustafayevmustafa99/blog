<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public  function  articleCount(){
         return $this->hasMany('App\Models\Article','category_id','id')->where('status',1)->count();
                                      //baglanacaqimiz model          //baglanacaqimiz sutun  //baglanacaqimiz Id
    }
}
