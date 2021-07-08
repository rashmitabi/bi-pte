<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PredictionFiles extends Model
{
    use HasFactory;
    protected $table = 'predictions';
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

    public function section()
    {
        return $this->belongsTo(Sections::class, 'section_id');
    }

    public function design()
    {
        return $this->belongsTo(QuestionDesigns::class, 'design_id');
    }

}
