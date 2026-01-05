<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PositionType extends Model
{
    protected $table = 'position_types';
    //

    // public function person () {
    //     return $this->hasMany(Person::class);
    // }

    public function positions() {
        return $this->hasMany(Position::class);
    }
}
