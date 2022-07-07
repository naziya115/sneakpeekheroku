<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    public function test_questions()
    {
        return $this->hasMany(Test_question::class)->inRandomOrder();
    }
    protected $fillable= [
        'id',
        'name',
        'grade',
        'subject'
    ];
}
