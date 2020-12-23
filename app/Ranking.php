<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{

  protected $table = 'rankings';

  public function insertScore(int $correctRatio, int $userId)
  {
    $ranking = new Ranking();
    $ranking->percentage_correct_answer = $correctRatio;
    $ranking->user_id = $userId;
    $ranking->save();
  }

  public function getCreatedAtAttribute($date)
  {
    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y/m/d');
  }

  public function user()
  {
    return $this->belongsTo('App\User', 'user_id', 'id');
  }
}