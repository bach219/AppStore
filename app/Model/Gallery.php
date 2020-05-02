<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'vp_galleries';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
