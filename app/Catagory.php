<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Catagory extends Model
{
    //
    use SoftDeletes;


    protected $guarded =[];



    protected $dates = ['deleted_at'];

    public function Products()
    {
        return $this->belongsToMany('App\Product','catagory_product');
    }

    public function childrens(){
        return $this->belongsToMany(Catagory::class,'catagory_parent','parent_id','catagory_id');
    }
    public function parents(){
        return $this->belongsToMany(Catagory::class,'catagory_parent','catagory_id','parent_id');
    }


}
