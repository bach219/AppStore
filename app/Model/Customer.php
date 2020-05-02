<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'vp_customers';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
