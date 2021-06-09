<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PredictionFiles extends Model
{
    use HasFactory;
    protected $table = 'email_templates';
    protected $fillable = [
        'user_id',
        'name',
        'subject',
        'body',
        'status'
    ];
}
