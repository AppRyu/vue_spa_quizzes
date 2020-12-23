<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ranking;
use Auth;

class RankingController extends Controller
{
    protected $ranking;

    public function __construct(Ranking $ranking)
    {
        $this->ranking = $ranking;
    }

    public function insertRanking(Request $request)
    {
        if(Auth::check()) {
            $correctRation = $request->input('correctRation');
            $this->ranking->insertScore((int)$correctRation, Auth::user()->id);
        }
        return redirect('/');
    }
}
