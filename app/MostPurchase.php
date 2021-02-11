<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MostPurchase extends Eloquent
{
    protected $fillable = ['product_name','quantity','created_at','time'];
}
