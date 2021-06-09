<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestResults extends Model
{
    use HasFactory;
    protected $table = 'test_results';
    protected $fillable = [ 
    	'test_id',
    	'user_id',
    	'section_id',
    	'question_type_id',
    	'get_score',
    	'question_id'

    ];
}
