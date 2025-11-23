<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //
    protected $fillable = [
        'username'
    ];

    public function education()
    {
        return $this->belongsTo(Education::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function position_type()
    {
        return $this->belongsTo(PositionType::class);
    }
}
