<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PositionType extends Model
{
    //

    public function person () {
        return $this->hasMany(Person::class);
    }
}
