<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    // define for mass assignment of members
    protected $fillable = ['members'];

    protected $appends = ['contact_id'];
    
    // define the one to many with groups
    public function members () {
        return $this->belongsToMany('App\Contact');
    }

    public function get_member_ids () {
        return $this->members()->pluck('contact_id');
    }
}
