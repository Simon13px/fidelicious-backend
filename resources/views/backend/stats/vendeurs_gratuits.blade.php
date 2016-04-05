@extends('backend.template')
@section('contenu')

  <h3>Statistiques sur : </h3>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      @include('backend.stats.menu_stats')
    </div>
  </nav>

    <h3>Trier par : </h3>
    <div class="navbar navbar-default">
      @include('backend.stats.menu_vendeurs')
      <br>
      <ul class="nav nav-pills">
          <li class="{{ $request->input('days') == 7 || $request->input('days') == '' ? 'active' : ''}}"><a href="{{ url('stats/vendeurs_gratuits?days=7') }}">7 jours</a></li>
          <li class="{{ $request->input('days') == 30 ? 'active' : ''}}"><a href="{{ url('/stats/vendeurs/discount?days=30') }}">30 jours</a></li>
          <li class="{{ $request->input('days') == 60 ? 'active' : ''}}"><a href="{{ url('/stats/vendeurs/discount?days=60') }}">60 jours</a></li>
          <li class="{{ $request->input('days') == 90 ? 'active' : ''}}"><a href="{{ url('/stats/vendeurs/discount?days=90') }}">90 jours</a></li>
          <li class="{{ $request->input('days') == 365 ? 'active' : ''}}"><a href="{{ url('/stats/vendeurs/discount?days=365') }}">1 an</a></li>
      </ul>

      <div class="container-fluid col-sm-10" >
          @if(empty($data))
            <h3>Aucune donnée ne correspond à la période donnée</h3>
          @endif
          <canvas id="BarChart" ></canvas>
      </div>

    {!! app()->chartbar->render("BarChart", $data) !!}

    </div>

@endsection
