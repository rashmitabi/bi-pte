<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrecticeAnswerData extends Model
{
    use HasFactory;
    protected $table = 'practice_answer_data';
    protected $fillable = [
        'practice_question_id',
        'answer_type',
        'answer_value',
        'answer_time',
        'sample_answer'
    ];
}
