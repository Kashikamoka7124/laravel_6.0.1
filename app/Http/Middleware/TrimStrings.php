<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    /**
     * The names of the attributes that should not be trimmed.
     *
     * @var array
     */
    protected $except = [
        'password',
        'password_confirmation',
    ];
}

/*
    ****************************************************************************
    |                   Documentation
    ****************************************************************************
    |1) Variable:
    ****************************************************************************
    |      $Except:
    |      *********************
    |       	  The except method will return all the key/value pairs in the collection
    |		where the keys in the collection are not in the supplied $keys array.
    |		Internally, this method makes a call to the
    |		"Illuminate\Support\Arr:except($array, $keys)" helper function.
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