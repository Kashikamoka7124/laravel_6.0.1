<?php

namespace App;
use App\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use app\profile;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];



    protected $gaurded =['*'];
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    Public function profile(){
        return $this->hasOne(profile::class);
    }
}


/*
    ****************************************************************************
    |                   Documentation
    ****************************************************************************
    |1) RelationShip Functions:
    ****************************************************************************
    |   Function Role():
    |   ****************** 
    |                   It shows that a user may have many Roles in an 
    |   organization
    | 
    |   Function Profile():
    |   ********************* 
    |                   It shows that a user may have many Roles in an 
    |   organization but with only one profile
    |****************************************************************************
    |1) Variables:
    *****************************************************************************
    |   $Fillable:
    |   *************
    |   You may also use the create method to save a new model in a single line. 
    |   The inserted model instance will be returned to you from the method. 
    |   However, before doing so, you will need to specify either a fillable or 
    |   guarded attribute on the model, as all Eloquent models protect against 
    |   mass-assignment.
    |
    |
    |     A mass-assignment vulnerability occurs when a user passes an unexpected
    |    HTTP parameter through a request, and that parameter changes a column in 
    |    your database you did not expect. For example, a malicious user might send 
    |    an is_admin parameter through an HTTP request, which is then mapped onto
    |    your model's create method, allowing the user to escalate themselves to an
    |    administrator.
    |************************************************
    |
    |
    |   $Guarded
    |   *************
    |           While $fillable serves as a "white list" of attributes that should be mass 
    |   assignable, you may also choose to use $guarded. The $guarded property should
    |   contain an array of attributes that you do not want to be mass assignable.
    |   All other attributes not in the array will be mass assignable. So, $guarded 
    |   functions like a "black list". Of course, you should use either $fillable or
    |   $guarded - not both.
    |***************************************************
    |
    |   $Hidden
    |   *************
    |           As it is cleared by name Hidden Variable are used to hide some
    |   credentials as we can see password and token is given in the hidden
    |
    |*****************************************************
    |
    |   $Casts
    |   **************
    |                 Casting a value means changing it to (or ensuring it is already) a 
    |   particular type.Some types you might be familiar with are integer or boolean.
    |
    |   Attribute casting is a feature of Eloquent models that allows you to set your model
    |   to automatically cast a particular attribute on your Eloquent model to a certain
    |   type.
    |*******************************************************
    |
    |
    |
    |
    |
    ****************************************************************************
*/