<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionQuestionScores extends Model
{
    use HasFactory;
    protected $table = 'section_question_scores';
    protected $fillable = [ 
    	'section_id',
    	'question_type_id',
    	'score_division'
    ];

    public function section()
    {
        return $this->belongsTo(Sections::class, 'section_id');
    }

    public function question_type()
    {
        return $this->belongsTo(QuestionTypes::class,'question_type_id');
    }
}
