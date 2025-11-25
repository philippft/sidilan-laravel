<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'people';
    //
    protected $fillable = [
    'full_name',
    'nip',
    'gender',
    'is_active',
    'education_id',
    'position_id',
    'position_type_id'
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
