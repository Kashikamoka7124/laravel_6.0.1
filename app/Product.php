 <?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    //
    use SoftDeletes;
    protected $gaurded =[];
    
    protected $dates = ['deleted_at'];



     public function catagories()
    {
        return $this->belongsToMany('App\catagory','catagory_product');
    }
}
