<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Update_History extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'profile_id' => 'required',
        'updated_at' => 'required',
    );
}
