<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Khill\Lavacharts\Lavacharts;

use Lava;
use App\Vente;
use DB;
use Carbon\Carbon;
use App\Vendeur;


class TestController extends Controller
{
    public function index()
    {

      // $days = 7;
      // $range = \Carbon\Carbon::now()->subDays($days);
      //
      // $ventes = Vente::where('created_at','>=', $range)
      //   ->groupBy('date')
      //   ->orderBy('date','DESC')
      //   ->get([
      //     DB::raw('Date(created_at) as date'),
      //     DB::raw('COUNT(*) as value'),
      //     DB::raw('SUM(count) as count')
      //   ]);
      //
      // $data = array();
      //
      // foreach($ventes as $vente)
      // {
      //   $data = array_add($data, $vente->date, array($vente->value, $vente->count));
      // }
      //
      // return view('test.index')->with('data', $data);

      $range = \Carbon\Carbon::now()->subDays(3600);

      dd($range);


    }
}
