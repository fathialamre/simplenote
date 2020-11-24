<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
