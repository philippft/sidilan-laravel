<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';
    //
    public function person()
    {
        return $this->hasMany(Person::class);
    }
}
