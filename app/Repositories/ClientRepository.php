<?php

  namespace App\Repositories;

  use App\Client;
  use App\User;

  class ClientRepository implements IClientRepository {

    public function getAll($userid)
    {
      return User::find($userid)->clients;
    }

    public function getWithToken($userid)
    {
      return User::find($userid)->clients()->where('bons_restants','>',0)->get();
    }

    public function getConfirmed($userid)
    {
      return User::find($userid)->clients()->where('confirme',1)->get();
    }

    public function storeClient($input, $userid)
    {
      User::find($userid)->clients()->create([
        'nom'                 => array_get($input, 'nom'),
        'prenom'              => array_get($input, 'prenom'),
        'gsm'                 => array_get($input, 'gsm'),
        'cp'                  => array_get($input, 'cp'),
        'email'               => array_get($input, 'email'),
        'rue'                 => array_get($input,'rue'),
        'ville'               => array_get($input, 'ville'),
        'cpt_visites'         => 0,
        'cpt_jetons'          => 0,
        'bons_restants'       => 0,
        'cpt_cartes_remplies' => 0
      ])->save();
    }

    public function retrieveById($id)
    {
      return Client::find($id);
    }

    public function editClient($input)
    {
      $id = array_get($input, 'id');
      $client = Client::find($id);

      $client->prenom = array_get($input, 'prenom');
      $client->nom = array_get($input, 'nom');
      $client->email = array_get($input,'email');
      $client->gsm = array_get($input,'gsm');
      $client->cp = array_get($input, 'cp');
      $client->rue = array_get($input, 'rue');
      $client->ville = array_get($input, 'ville');
      $client->cpt_jetons = array_get($input, 'jetons');
      $client->bons_restants = array_get($input, 'bons');

      $client->save();
    }

    public function deleteClient($id)
    {
      Client::find($id)->delete();
    }
  }
