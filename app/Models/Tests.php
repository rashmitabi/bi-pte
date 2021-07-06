<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tests extends Model
{
    use HasFactory;
    protected $table = 'generate_tests';
    protected $fillable = [
    	'test_name',
        'subject_id',
        'generated_by_user_id',
        'generated_by_role_id',
        'type',
        'free_test',
        'status',
        'expired_date',
        'image'
    ];
    public function subject() 
    {
        return  $this->belongsTo('App\Models\Subjects', 'subject_id');
    }
}
