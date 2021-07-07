<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSession extends Model
{
    use HasFactory;
    protected $table = 'user_session';
    protected $fillable = [
    	'user_id',
        'role_id',
        'created_at'
    ];
}
