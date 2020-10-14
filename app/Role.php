<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Link the role model to the user model
     */
    public function users(){
        return $this->hasMany('App\User');
    }
}
