<?php

  namespace App\Repositories;

  use App\Vendeur;
  use App\User;

  class VendeurRepository implements IVendeurRepository {
    public function getAll($userid)
    {
      return User::find($userid)->vendeurs;
    }

    public function storeVendeur($prenom, $nom, $code, $userid)
    {
      User::find($userid)->vendeurs()->create([
        'prenom'  => $prenom,
        'nom'     => $nom,
        'code'    => $code
      ])->save();
    }

    public function retrieveById($id)
    {
      return Vendeur::find($id);
    }

    public function editVendeur($prenom, $nom, $code, $id)
    {
      $vendeur = Vendeur::find($id);

      $vendeur->prenom = $prenom;
      $vendeur->nom = $nom;
      $vendeur->code = $code;

      $vendeur->save();
    }

    public function deleteVendeur($id)
    {
      Vendeur::find($id)->delete();
    }
  }
