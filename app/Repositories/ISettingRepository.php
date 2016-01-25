<?php

    namespace App\Repositories;

    interface ISettingRepository {
      public function getSettingByUser($userid);
      public function setSettingsByUser($nom_jetons,$max_bons,$max_jetons, $userid);
    }
