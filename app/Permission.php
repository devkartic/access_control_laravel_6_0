<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['role_id', 'link_id', 'read', 'create', 'update', 'delete'];

}
