<?php

  namespace App\Repositories;

  interface IVendeurRepository{

    public function getAll($userid);
    public function storeVendeur($prenom, $nom, $code, $userid);
    public function retrieveById($id);
    public function editVendeur($prenom, $nom, $code, $id);
    public function deleteVendeur($id);
  }
