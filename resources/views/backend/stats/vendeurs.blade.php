@extends('backend.template')
@section('contenu')

  <p><h1>Statistiques</h1><a href="/backend" class="btn btn-default">Retour</a></p>

  <hr>

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
        <li role="presentation" class="active"><a href="/stats/vendeurs">Ventes totales</a></li>
        <li role="presentation"><a href="/stats/ventes_vendeurs">Ventes par période</a></li>
        <li role="presentation"><a href="/stats/vendeurs_gratuits">Ventes gratuites</a></li>
      </ul>
      <br>

      <div id="stats-container" style="height: 400px;"></div>

      <script type="text/javascript">

        var data = <?php echo $stats; ?>;

        new Morris.Bar({
          element: 'stats-container',
          data: data,
          xkey: 'prenom',
          ykeys: ['value'],
          labels: ['Ventes']
        });
      </script>

    </div>



@endsection
