<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //
    protected $table = 'vp_sales';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
