<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    //
    use SoftDeletes;
    protected $guarded  =[];
    
    protected $dates = ['deleted_at'];



     public function catagories()
    {
        return $this->belongsToMany('App\catagory','catagory_product');
    }
}

/*
	****************************************************************************
	|					Documentation
	****************************************************************************
	|1) RelationShip:
	****************************************************************************
	|	Function Categories(): //Note plural name
	|						It return that it belong to the product model with
	|	many-to-many relation 
	|
	|
	|
	|
	|
	|
	|
	|
	|
	|
	|
	****************************************************************************
*/