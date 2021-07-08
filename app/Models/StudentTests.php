<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentTests extends Model
{
    use HasFactory;
    protected $table = 'student_tests';
    protected $fillable = [
    	'user_id',
    	'test_id',
    	'status',
    	'start_date',
    	'end_date'
    ];
}
