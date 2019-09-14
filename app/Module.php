<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['name', 'fa_icon', 'order_number', 'status'];

    public function links(){
        return $this->hasMany(Link::class);
    }
}
