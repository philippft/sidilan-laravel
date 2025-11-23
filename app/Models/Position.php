<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    //
    public function person()
    {
        return $this->hasMany(Person::class)->orderBy('option_text', 'asc');
    }
}
