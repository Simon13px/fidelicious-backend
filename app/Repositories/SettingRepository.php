<?php

  namespace App\Repositories;

  use App\Setting;
  use App\User;

  class SettingRepository implements ISettingRepository
  {
    public function getSettingByUser($userid)
    {
        $settings = User::find($userid)->setting;

        if(is_null($settings)){
          $settings = new Setting();
          $settings->nom_jetons = "A définir";
          $settings->nbr_max_bons = 0;
          $settings->nbr_max_jetons = 0;
        }

        return $settings;
    }

    public function setSettingsByUser($nom_jetons,$max_bons,$max_jetons, $userid)
    {
      $settings = User::find($userid)->setting;

      $settings->nom_jetons = $nom_jetons;
      $settings->nbr_max_bons = $max_bons;
      $settings->nbr_max_jetons = $max_jetons;
      $settings->save();
    }
  }
