<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Order extends Eloquent
{
    protected $dates = array('created_at');


    function user()
    {
        return $this->hasOne('App\User', 'id', 'owner_id');
    }


    //END
}
