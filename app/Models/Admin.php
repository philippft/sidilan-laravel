<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{
    protected $table = 'admins';
    use HasFactory;
    
    protected $fillable = [
        'username',
        'password',
        'email',
        'role'
    ];

    protected $hidden = [
        'password',
    ];
}
