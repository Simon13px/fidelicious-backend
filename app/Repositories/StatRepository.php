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
                    ])
                    ->toJSON();
    }
  }
