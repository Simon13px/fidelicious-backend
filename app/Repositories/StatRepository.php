<?php

  namespace App\Repositories;

  use App\User;
  use DB;
  use App\Client;

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

    public function getStatsVendeurDiscount($userid, $range)
    {
      return DB::table('ventes')
                ->join('vendeurs','ventes.vendeur_id','=','vendeurs.id')
                ->select(DB::raw('sum(discount) as value, vendeurs.prenom as prenom, vendeurs.nom as nom'))
                ->where([
                    ['ventes.created_at','>=',$range],
                    ['ventes.user_id','=',$userid],
                    ['ventes.discount','>',0]
                  ])
                ->groupBy('prenom')
                ->orderBy('prenom')
                ->get();
    }

    public function getStatsVendeursCancelled($userid)
    {
      return DB::table('ventes')
                ->join('vendeurs','ventes.vendeur_id','=','vendeurs.id')
                ->select(DB::raw('count(*) as value, vendeurs.prenom as prenom, vendeurs.nom as nom'))
                ->where([
                    ['ventes.cancelled','=',true],
                    ['ventes.user_id','=',$userid]
                  ])
                ->groupBy('prenom')
                ->orderBy('prenom')
                ->get();
    }

    public function getStatsClient($userid, $range)
    {
      return Client::where([['created_at','>=',$range],['user_id','=',$userid]])
        ->groupBy('date')
        ->orderBy('date','DESC')
        ->get([
            DB::raw('Date(created_at) as date'),
            DB::raw('COUNT(*) as value')
          ]);
    }

    public function getStatsTopClient($userid)
    {
      return User::find($userid)->clients()
                    ->where('cpt_visites','>',0)
                    ->orderBy('cpt_visites', 'DESC')
                    ->take(10)
                    ->get([
                      DB::raw('gsm as gsm'),
                      DB::raw('cpt_visites as value')
                    ]);
    }

    public function getStatsTopBuyingClient($userid)
    {
      return DB::table('ventes')
                ->join('clients','ventes.client_id','=','clients.id')
                ->select(DB::raw('sum(count) as value, clients.gsm as gsm'))
                ->where([
                    ['ventes.user_id','=',$userid]
                  ])
                ->groupBy('gsm')
                ->orderBy('value','DESC')
                ->get();
    }

    public function getMiscTotals($userid)
    {
      $datas = array();

      $sales = User::find($userid)->ventes()->count();
      $datas = array_add($datas, 'sales', $sales);

      $products = DB::table('ventes')->where('user_id',$userid)->sum('count');
      $datas = array_add($datas, 'products',$products);

      $biggest = DB::table('ventes')->where('user_id',$userid)->max('count');
      $datas = array_add($datas, 'biggest', $biggest);

      $avg = DB::table('ventes')->where('user_id',$userid)->avg('count');
      $datas = array_add($datas, 'avg', $avg);

      $free = DB::table('ventes')->where('user_id',$userid)->sum('discount');
      $datas = array_add($datas, 'free', $free);

      $clients = DB::table('clients')->where('user_id',$userid)->count();
      $datas = array_add($datas, 'clients', $clients);

      $confirmed = DB::table('clients')->where(['user_id'=>$userid,'confirme'=>1])->count();
      $datas = array_add($datas, 'confirmed', $confirmed);

      $cancelled = DB::table('ventes')->where(['user_id'=>$userid,'cancelled'=>1])->count();
      $datas = array_add($datas, 'cancelled', $cancelled);

      return $datas;

    }
  }
