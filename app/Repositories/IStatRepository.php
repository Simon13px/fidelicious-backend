<?php

  namespace App\Repositories;

  interface IStatRepository {
    public function getStatsVentes($range, $userid);
  }
