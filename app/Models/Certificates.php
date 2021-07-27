<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificates extends Model
{
    use HasFactory;
    protected $table = 'certificates';
    protected $fillable = [
        'student_user_id',
        'test_id',
        'generate_by_user_id',
        'score',
        'speaking',
        'listening',
        'reading',
        'writing',
        'grammar',
        'pronunciation',
        'vocabulary',
        'oral_fluency',
        'spelling',
        'written_discourse',
        'file_path'
    ];

    public function test() 
    {
        return  $this->belongsTo('App\Models\Tests', 'test_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_user_id');
    }
}
