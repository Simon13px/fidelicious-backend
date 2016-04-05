<?php

  namespace App\Repositories;

  interface IClientRepository {
    public function getAll($userid);
    public function getWithToken($userid);
    public function getConfirmed($userid);
    public function storeClient($input, $userid);
    public function retrieveById($id);
    public function editClient($input);
    public function deleteClient($id);
  }
