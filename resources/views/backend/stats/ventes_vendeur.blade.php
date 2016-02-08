@extends('backend.template')
@section('contenu')

  <h3>Statistiques sur : </h3>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <ul class="list-inline nav navbar-nav">
        <li ><a href="/stats/ventes">Ventes</a></li>
        <li class="active"><a href="">Vendeurs</a></li>
        <li><a href="/stats/clients">Clients</a></li>
      </ul>
    </divv>
  </nav>

    <h3>Trier par : </h3>
    <div class="navbar navbar-default">
      <ul class="nav nav-tabs">
        <li role="presentation" ><a href="/stats/vendeurs">Ventes totales</a></li>
        <li role="presentation" class="active"><a href="">Ventes par période</a></li>
        <li role="presentation"><a href="/stats/vendeurs/sandwiches">Ventes gratuites</a></li>
      </ul>
      <br>
      <ul class="nav nav-pills">
          <li class="{{ $request->input('days') == 7 || $request->input('days') == '' ? 'active' : ''}}"><a href="{{ url('/stats/vendeurs/ventes?days=7') }}">7 jours</a></li>
          <li class="{{ $request->input('days') == 30 ? 'active' : ''}}"><a href="{{ url('/stats/vendeurs/ventes?days=30') }}">30 jours</a></li>
          <li class="{{ $request->input('days') == 60 ? 'active' : ''}}"><a href="{{ url('/stats/vendeurs/ventes?days=60') }}">60 jours</a></li>
          <li class="{{ $request->input('days') == 90 ? 'active' : ''}}"><a href="{{ url('/stats/vendeurs/ventes?days=90') }}">90 jours</a></li>
          <li class="{{ $request->input('days') == 365 ? 'active' : ''}}"><a href="{{ url('/stats/vendeurs/ventes?days=365') }}">1 an</a></li>
      </ul>

      <div class="container-fluid" style="width:900px">
          <canvas id="BarChart" ></canvas>
      </div>

    {!! app()->chartbar->render("BarChart", $data) !!}

    </div>



@endsection
