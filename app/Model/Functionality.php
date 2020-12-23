<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Functionality extends Model
{
    protected $table = 'vp_functionality';
    protected $primaryKey = 'func_id';
    protected $guarded = [];
}
