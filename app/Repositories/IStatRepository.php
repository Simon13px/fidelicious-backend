<?php

  namespace App\Repositories;

  interface IStatRepository {
    public function getStatsVentes($range, $userid);
    public function getStatsVentesSandwiches($range, $userid);
    public function getStatsTotalVendeur($userid);
    public function getStatsPeriodVendeur($userid, $range);
    public function getStatsVendeurSandwiches($userid, $range);
    public function getStatsVendeurDiscount($userid, $range);
    public function getStatsVendeursCancelled($userid);
    public function getStatsClient($userid, $range);
    public function getStatsTopClient($userid);
    public function getStatsTopBuyingClient($userid);
    public function getMiscTotals($userid);
  }
