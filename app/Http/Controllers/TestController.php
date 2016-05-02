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

      // $vendeur = new Vendeur([
      //   'nom' => 'Simon',
      //   'prenom' => 'Cornet',
      //   'code' => '5436'
      // ]);
      //
      // $array = array();
      //
      // $array = array_add($array , 'vendeur',$vendeur);
      //
      // $value = array_get($array, 'vendeur.prenom');
      // dd($value);


    $array = array("pouet","meuh");
    dd($array);
    }
}
