<?php

  namespace App\Repositories;

  interface IStatRepository {
    public function getStatsVentes($range, $userid);
    public function getStatsVentesSandwiches($range, $userid);
    public function getStatsTotalVendeur($userid);
    public function getStatsPeriodVendeur($userid, $range);
    public function getStatsVendeurSandwiches($userid, $range);
  }
