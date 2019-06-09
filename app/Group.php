<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    // define for mass assignment of members
    protected $fillable = ['members'];
    
    // define the one to many with groups
    public function members () {
        return $this->hasMany('App\Contact');
    }
}
