<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test_question_answer extends Model
{
    use HasFactory;

    protected $fillable= [
        'id',
        'name',
        'test_question_id',
        'is_correct',
        'created_at',
        'updated_at'
    ];
}
