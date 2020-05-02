<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'vp_contacts';
    protected $primaryKey = 'con_id';
    protected $guarded = [];
}
