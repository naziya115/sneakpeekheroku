<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test_question extends Model
{
    use HasFactory;

    public function test_question_answers()
    {
        return $this->hasMany(Test_question_answer::class)->inRandomOrder();
    }

    protected $fillable= [
        'id',
        'name',
        'test_id',
        'created_at',
        'updated_at'
    ];
}
