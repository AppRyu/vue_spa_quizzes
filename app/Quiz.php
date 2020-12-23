<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Answer;
use App\Category;

class Quiz extends Model
{
    protected $table= 'quizzes';

    public function answer() 
    {
        return $this->hasOne('App\Answer', 'id', 'answers_id');
    }
    public function category()
    {
        return $this->hasOne('App\Category', 'id', 'categories_id');
    }
}
