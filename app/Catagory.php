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


/*
    ****************************************************************************
    |                   Documentation
    ****************************************************************************
    | 1) RelationShip:
    ****************************************************************************
    |   Relationship means make relationship between the related data
    |   There are creating two type of Relation in using the catagory 
    |   model. A category can have many products as well a product can
    |   have many categories to. Therefore we will call it many-to-many
    |   relationship
    |   
    |   Function Products():
    |                       Its return the Relation of many-to-many with category
    |   for creating the relation we to write the table into the Alphabetically 
    |   sorted. Means that A - Z as you can see in the returning function of the
    |   Product it Create the relation category_product Alphatically sorted 
    |
    |
    |   Function Childrens():
    |                       Also working as same as Product function
    |
    |
    |
    |
    |
    |
    |
    ****************************************************************************
*/