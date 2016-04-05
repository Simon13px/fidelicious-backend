@extends('backend.template')
@section('contenu')

  <h3>Statistiques sur : </h3>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <ul class="list-inline nav navbar-nav">
        @include('backend.stats.menu_stats')
      </ul>
    </divv>
  </nav>

    <h3>Trier par : </h3>
    <div class="navbar navbar-default">
      @include('backend.stats.menu_vendeurs')
      <br>

      <div class="container-fluid col-sm-10" >
          @if(empty($data))
            <h3>Aucune donnée ne correspond à la période donnée</h3>
          @endif
          <canvas id="BarChart" ></canvas>
      </div>
    {!! app()->chartbar->render("BarChart", $data) !!}

    </div>



@endsection
