<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    use HasFactory;
    protected $table = 'videos';
    protected $fillable = [ 
    	'user_id',
    	'section_id',
    	'design_id',
    	'title',
    	'description',
    	'link',
    	'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
