<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;
    protected $table = 'log_activities';
    protected $fillable = [ 
    	'user_id',
    	'role_id',
    	'subject',
    	'message',
    	'ip_address',
    	'latitude',
    	'longitude'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function role()
    {
        return $this->belongsTo(Roles::class,'role_id');
    }
}
