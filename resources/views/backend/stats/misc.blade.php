@extends('backend.template')
@section('contenu')

  <h3>Statistiques sur : </h3>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <ul class="list-inline nav navbar-nav">
        @include('backend.stats.menu_stats')
      </ul>
    </div>
  </nav>


  <div class="navbar navbar-default">

    <br>
    <div class="col-md-12">
      <p>Nombre de ventes totales : {{$datas['sales']}}</p>
      <p>Produits vendus : {{$datas['products']}}</p>
      <p>Produits vendus en moyenne par commande : {{number_format($datas['avg'],2)}}</p>
      <p>Produits vendus maximum en une commande : {{$datas['biggest']}}</p>
      <p>Produits gratuits : {{$datas['free']}}</p>
      <p>Clients inscrits : {{$datas['clients']}}</p>
      <p>Clients confirmés : {{$datas['confirmed']}}</p>
      <p>Commandes annulées : {{$datas['cancelled']}}</p>
    </div>

  </div>













@endsection
