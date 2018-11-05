<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    public function creator(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
