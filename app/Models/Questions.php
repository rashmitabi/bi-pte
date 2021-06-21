<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $fillable = [
    	'section_id',
    	'test_id',
        'design_id',
        'question_type_id',
        'name',
        'short_desc',
        'desc',
        'order',
        'status',
        'marks',
        'answer_time',
        'waiting_time',
        'max_time'
    ];
}
