<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\IVendeurRepository;
use Auth;

class VendeursController extends Controller
{
    public function __construct(IVendeurRepository $vendeur)
    {
      $this->middleware('auth');
      $this->vendeur = $vendeur;
    }

    public function index()
    {
      $userid = Auth::user()->id;
      $liste_vendeurs = $this->vendeur->getAll($userid);
      $count = $liste_vendeurs->count();

      return view('backend.vendeurs.index')->with(['liste_vendeurs'=>$liste_vendeurs,'count'=>$count]);
    }

    public function postAdd(Request $request)
    {
      $userid = Auth::user()->id;

      $prenom = $request->input('prenom');
      $nom = $request->input('nom');
      $code = $request->input('code');

      $this->vendeur->storeVendeur($prenom, $nom, $code, $userid);

      return redirect()->action('VendeursController@index');
    }

    public function getEdit($id)
    {

      $vendeur = $this->vendeur->retrieveById($id);

      return view('backend.vendeurs.edit')->with('vendeur',$vendeur);
    }

    public function postEdit(Request $request)
    {
      $id = $request->input('id');
      $prenom = $request->input('prenom');
      $nom = $request->input('nom');
      $code = $request->input('code');

      $this->vendeur->editVendeur($prenom, $nom, $code, $id);

      return redirect()->action('VendeursController@index');
    }

    public function delete($id)
    {
      $this->vendeur->deleteVendeur($id);

      return redirect()->action('VendeursController@index');
    }


}
