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
    	'question_type_id',
    	'title',
    	'description',
    	'link',
    	'status'
    ];
}
