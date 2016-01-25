@extends('backend.template')
@section('contenu')

  <p><h1>Vendeurs</h1><a href="/" class="btn btn-default">Retour</a></p>
  <hr>

  <a href="vendeurs/add" class="btn btn-default" role="button">Créer un vendeur</a>
  <br><br>

  <h2>Liste des vendeurs enregistrés</h2>

  <p>{{$count}} vendeurs enregistrés </p>
  <p><input type="search" class="light-table-filter" data-table="order-table" placeholder="Filtrer"></p>

  <div class="col-sm-6">
  <table class="tablesorter table order-table" id="listing">
    <thead>
      <tr>
        <th class="header">Prénom<span></span</th>
        <th class="header">Nom</th>
        <th class="header">Ventes</th>
      </tr>
    </thead>
    <tbody>
    @forelse ($liste_vendeurs as $vendeur)
      <tr>
        <td>{{$vendeur->prenom}}</td>
        <td>{{$vendeur->nom}}</td>
        <td>{{$vendeur->cpt_ventes}}</td>
        <td>
          <a href="vendeurs/edit/{{$vendeur->id}}" class="btn btn-default" role="button">
            <span class="glyphicon glyphicon-pencil"></span>
          </a>
        </td>
        <td>
          <a href="vendeurs/delete/{{$vendeur->id}}" class="btn btn-default" role="button">
            <span class="glyphicon glyphicon-remove"></span>
          </a>
        </td>
      <tr>
    @empty
      <h3>Aucun vendeur n'est enregistré pour l'instant.</h3>
    @endforelse
    </tbody>
  </table>
  </div>

@endsection
