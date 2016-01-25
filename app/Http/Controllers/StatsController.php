<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Repositories\IStatRepository;
use App\Vente;
use DB;

class StatsController extends Controller
{
    public function __construct(IStatRepository $stat)
    {
      $this->middleware('auth');
      $this->stat = $stat;
    }

    public function index(Request $request)
    {
      $userid = Auth::user()->id;

      $days = $request->input('days', 7);

      $range = \Carbon\Carbon::now()->subDays($days);

      $stats = $this->stat->getStatsVentes($range, $userid);

      // $stats = Vente::where('created_at','>=',$range)
      //   ->groupBy('date')
      //   ->orderBy('date','DESC')
      //   ->get([
      //       DB::raw('Date(created_at) as date'),
      //       DB::raw('COUNT(*) as value')
      //     ])
      //     ->toJSON();

      return view('backend.stats.index', compact('stats'))->with('request', $request);
    }
}
