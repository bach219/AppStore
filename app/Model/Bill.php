<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'vp_bills';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
