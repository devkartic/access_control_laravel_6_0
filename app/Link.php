<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['name', 'module_id', 'order_number', 'status'];

    public function module(){
        return $this->belongsTo(Module::class);
    }

    public function permissions(){
        return $this->hasMany(Permission::class);
    }
}
