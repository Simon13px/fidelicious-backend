<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\IClientRepository;

use Auth;

class ClientsController extends Controller
{
      public function __construct(IClientRepository $client)
      {
        $this->middleware('auth');
        $this->client = $client;
      }

      public function index()
      {
        $userid = Auth::user()->id;
        $liste_clients = $this->client->getAll($userid);
        $count = $liste_clients->count();

        return view('backend.clients.index')->with(['liste_clients'=>$liste_clients,'count'=>$count]);
      }

      public function listingBon()
      {
        $userid = Auth::user()->id;
        $liste_clients = $this->client->getWithToken($userid);
        $count = $liste_clients->count();

        return view('backend.clients.listingbon')->with(['liste_clients'=>$liste_clients,'count'=>$count]);
      }

      public function listingConfirm(){
        $userid = Auth::user()->id;
        $liste_clients = $this->client->getConfirmed($userid);

        $count = $liste_clients->count();

        return view('backend.clients.listingconfirmed')->with(['liste_clients'=>$liste_clients,'count'=>$count]);
      }

      public function postAdd(Request $request)
      {
        $userid = Auth::user()->id;
        $input = $request->all();
        $this->client->storeClient($input, $userid);

        return redirect()->action('ClientsController@index');
      }

      public function getEdit($id)
      {
        $client = $this->client->retrieveById($id);

        return view('backend.clients.edit')->with('client',$client);
      }

      public function postEdit(Request $request)
      {
        $input = $request->all();

        $this->client->editClient($input);

        return redirect()->action('ClientsController@index');
      }

      public function delete($id)
      {
        $this->client->deleteClient($id);

        return redirect()->action('ClientsController@index');
      }
}
