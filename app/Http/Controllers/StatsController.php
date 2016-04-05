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
    /* VENTES */
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

      // return view('backend.stats.index')->with(['request'=> $request, 'data'=>$data]);
      return view('backend.stats.index',['request'=>$request, 'data'=>$data]);
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
    /*** FIN VENTES ***/

    /* VENDEURS */
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

    public function vendeurs_cancelled()
    {
      $userid = Auth::id();

      $ventes = $this->stat->getStatsVendeursCancelled($userid);

      $data = array();

      foreach($ventes as $vente)
      {
        $data = array_add($data, $vente->prenom.' '.$vente->nom, array($vente->value));
      }

      return view('backend.stats.vendeurs_cancelled')->with('data',$data);
    }

    /*** FIN VENDEURS ***/

    /* CLIENTS */
    public function clients(Request $request)
    {
      $userid = Auth::user()->id;

      $days = $request->input('days',7);

      $range = \Carbon\Carbon::now()->subDays($days);

      $ventes = $this->stat->getStatsClient($userid, $range);

      $data = array();

      foreach($ventes as $vente)
      {
        $data = array_add($data, $vente->date, array($vente->value));
      }

      return view('backend.stats.clients')->with(['request'=>$request, 'data'=>$data]);
    }

    public function top_clients(Request $request)
    {
      $userid = Auth::user()->id;

      $ventes = $this->stat->getStatsTopClient($userid);

      $data = array();

      foreach ($ventes as $vente) {
        $data = array_add($data, $vente->gsm, array($vente->value));
      }

      return view('backend.stats.top_clients')->with(['request'=> $request, 'data'=>$data]);
    }

    public function topbuying_clients(Request $request)
    {
      $userid = Auth::user()->id;

      $ventes = $this->stat->getStatsTopBuyingClient($userid);

      $data = array();

      foreach ($ventes as $vente) {
        $data = array_add($data, $vente->gsm, array($vente->value));
      }

      return view('backend.stats.topbuying_clients')->with(['request'=> $request, 'data'=>$data]);
    }

    /*** FIN CLIENTS ***/

    /* MISC */
    public function misc()
    {

      $userid = Auth::id();

      $datas = $this->stat->getMiscTotals($userid);

      return view('backend.stats.misc')->with('datas',$datas);
    }






    /*** FIN MISC ***/
}
