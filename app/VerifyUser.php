<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
    protected $guarded = [];

    // Relació
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
