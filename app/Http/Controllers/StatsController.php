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

      $ventes = $this->stat->getStatsVentes($range, $userid);

      $data = array();

      foreach($ventes as $vente)
      {
        $data = array_add($data, $vente->date, array($vente->value));
      }

      return view('backend.stats.index')->with(['request'=> $request, 'data'=>$data]);
    }

    public function ventes_sandwiches(Request $request)
    {
      $userid = Auth::user()->id;

      $days = $request->input('days', 7);

      $range = \Carbon\Carbon::now()->subDays($days);

      $ventes = $this->stat->getStatsVentesSandwiches($range, $userid);

      $data = array();

      foreach($ventes as $vente)
      {
        $data = array_add($data, $vente->date, array($vente->value));
      }

      return view('backend.stats.ventes_sandwiches')->with(['request'=> $request, 'data'=>$data]);
    }

    public function vendeurs(Request $request)
    {
      $userid = Auth::user()->id;

      $ventes = $this->stat->getStatsTotalVendeur($userid);

      $data = array();

      foreach ($ventes as $vente) {
        $data = array_add($data, $vente->prenom.' '.$vente->nom, array($vente->value));
      }

      return view('backend.stats.vendeurs')->with(['request'=> $request, 'data'=>$data]);
    }

    public function ventes_vendeurs(Request $request)
    {
      $userid = Auth::user()->id;

      $days = $request->input('days',7);

      $range = \Carbon\Carbon::now()->subDays($days);

      $ventes = $this->stat->getStatsPeriodVendeur($userid, $range);

      $data = array();

      foreach($ventes as $vente)
      {
        $data = array_add($data, $vente->prenom.' '.$vente->nom, array($vente->value));
      }

      return view('backend.stats.ventes_vendeur')->with(['request'=>$request, 'data'=>$data]);
    }

    public function vendeurs_sandwiches(Request $request)
    {
      $userid = Auth::user()->id;

      $days = $request->input('days',7);

      $range = \Carbon\Carbon::now()->subDays($days);

      $ventes = $this->stat->getStatsVendeurSandwiches($userid, $range);

      $data = array();

      foreach($ventes as $vente)
      {
        $data = array_add($data, $vente->prenom.' '.$vente->nom, array($vente->value));
      }

      return view('backend.stats.vendeurs_sandwiches')->with(['request'=>$request, 'data'=>$data]);

    }

    public function vendeurs_discount(Request $request)
    {
      $userid = Auth::user()->id;

      $days = $request->input('days',7);

      $range = \Carbon\Carbon::now()->subDays($days);

      $ventes = $this->stat->getStatsVendeurDiscount($userid, $range);

      $data = array();

      foreach($ventes as $vente)
      {
        $data = array_add($data, $vente->prenom.' '.$vente->nom, array($vente->value));
      }

      return view('backend.stats.vendeurs_gratuits')->with(['request'=>$request, 'data'=>$data]);

    }
}
