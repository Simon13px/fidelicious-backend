@extends('backend.template')
@section('contenu')

  <p><h1>Statistiques</h1><a href="/backend" class="btn btn-default">Retour</a></p>

  <hr>

  <h3>Statistiques sur : </h3>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <ul class="list-inline nav navbar-nav">
        <li ><a href="/stats/ventes">Ventes</a></li>
        <li ><a href="/stats/vendeurs">Vendeurs</a></li>
        <li class="active"><a href="">Clients</a></li>
      </ul>
    </divv>
  </nav>

    <h3>Trier par : </h3>
    <div class="navbar navbar-default">
      <ul class="nav nav-tabs">
        <li role="presentation" ><a href="/stats/clients">Inscriptions</a></li>
        <li role="presentation" class="active"><a href="">Nombre de visites</a></li>
      </ul>
      <br>
      <ul class="nav nav-pills">
          <li class="{{ Input::get('days') == 7 || Input::get('days') == '' ? 'active' : ''}}"><a href="{{ url('/stats/visites_clients?days=7') }}">7 jours</a></li>
          <li class="{{ Input::get('days') == 30 ? 'active' : ''}}"><a href="{{ url('/stats/visites_clients?days=30') }}">30 jours</a></li>
          <li class="{{ Input::get('days') == 60 ? 'active' : ''}}"><a href="{{ url('/stats/visites_clients?days=60') }}">60 jours</a></li>
          <li class="{{ Input::get('days') == 90 ? 'active' : ''}}"><a href="{{ url('/stats/visites_clients?days=90') }}">90 jours</a></li>
          <li class="{{ Input::get('days') == 365 ? 'active' : ''}}"><a href="{{ url('/stats/visites_clients?days=365') }}">1 an</a></li>
      </ul>

      <div id="stats-container" style="height: 400px;"></div>

      <script type="text/javascript">

        var data = <?php echo $stats; ?>;

        new Morris.Bar({
          element: 'stats-container',
          data: data,
          xkey: 'gsm',
          ykeys: ['value'],
          labels: ['Ventes']
        });
      </script>

    </div>



@endsection
