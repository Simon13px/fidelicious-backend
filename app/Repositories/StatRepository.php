<?php

  namespace App\Repositories;

  use App\User;
  use DB;

  class StatRepository implements IStatRepository {
    public function getStatsVentes($range, $userid)
    {
      return User::find($userid)->ventes()
                    ->where('created_at','>=',$range)
                    ->groupBy('date')
                    ->orderBy('date', 'DESC')
                    ->get([
                      DB::raw('Date(created_at) as date'),
                      DB::raw('COUNT(*) as value')
                    ]);
    }

    public function getStatsVentesSandwiches($range, $userid)
    {
      return User::find($userid)->ventes()
                    ->where('created_at','>=',$range)
                    ->groupBy('date')
                    ->orderBy('date', 'DESC')
                    ->get([
                      DB::raw('Date(created_at) as date'),
                      DB::raw('SUM(count) as value')
                    ]);
    }

    public function getStatsTotalVendeur($userid)
    {
      return User::find($userid)->vendeurs()
                    ->groupBy('cpt_ventes')
                    ->orderBy('cpt_ventes','DESC')
                    ->get([
                      DB::raw('prenom as prenom'),
                      DB::raw('nom as nom'),
                      DB::raw('cpt_ventes as value')
                    ]);
    }

    public function getStatsPeriodVendeur($userid, $range)
    {
      return DB::table('ventes')
                ->join('vendeurs','ventes.vendeur_id','=','vendeurs.id')
                ->select(DB::raw('count(*) as value, vendeurs.prenom as prenom, vendeurs.nom as nom'))
                ->where([
                    ['ventes.created_at','>=',$range],
                    ['ventes.user_id','=',$userid]
                  ])
                ->groupBy('prenom')
                ->orderBy('prenom')
                ->get();
    }

    public function getStatsVendeurSandwiches($userid, $range)
    {
      return DB::table('ventes')
                ->join('vendeurs','ventes.vendeur_id','=','vendeurs.id')
                ->select(DB::raw('sum(count) as value, vendeurs.prenom as prenom, vendeurs.nom as nom'))
                ->where([
                    ['ventes.created_at','>=',$range],
                    ['ventes.user_id','=',$userid]
                  ])
                ->groupBy('prenom')
                ->orderBy('prenom')
                ->get();
    }
  }
