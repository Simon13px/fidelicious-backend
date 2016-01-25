@extends('backend.template')
@section('contenu')

  <p><h1>Clients</h1><a href="/" class="btn btn-default">Retour</a></p>

  <hr>

  <p><a href="/clients/add" class="btn btn-default">Ajouter un client</a></p>

  <h2>Liste des clients enregistrés</h2>
  <div class="navbar navbar-default">
    <ul class="nav nav-tabs">
      <li role="presentation" class="active"><a href="clients">Tous les clients</a></li>
      <li role="presentation"><a href="/clients/listbon">Clients avec un bon</a></li>
    </ul>
    <br>
    <p>{{$count}} clients enregistrés</p>
    <p><input type="search" class="light-table-filter" data-table="order-table" placeholder="Filtrer"></p>
    <table class="table tablesorter order-table">
      <thead>
        <tr>
          <th class="header">Prénom</th>
          <th class="header">Nom</th>
          <th class="header">Email</th>
          <th class="header">N° GSM</th>
          <th class="header">
            Code Postal
          </th>
          <th class="header">
            Rue
          </th>
          <th class="header">
            Ville
          </th>
          <th class="header">
            Visites
          </th>
          <th class="header">
            Jetons
          </th>
          <th class="header">
            Bons
          </th>
          <th class="header">
            Cartes remplies
          </th>
        </tr>
      </thead>
    @forelse ($liste_clients as $client)
      <tr>
        <td>
          {{$client->prenom}}
        </td>
        <td>
          {{$client->nom}}
        </td>
        <td>
          {{$client->email}}
        </td>
        <td>
          {{$client->gsm}}
        </td>
        <td>
          {{$client->cp}}
        </td>
        <td>
          {{$client->rue}}
        </td>
        <td>
          {{$client->ville}}
        </td>
        <td>
          {{$client->cpt_visites}}
        </td>
        <td>
          {{$client->cpt_jetons}}
        </td>
        <td>
          {{$client->bons_restants}}
        </td>
        <td>
          {{$client->cpt_cartes_remplies}}
        </td>
        <td>
          <a href="clients/edit/{{$client->id}}" class="btn btn-default" role="button">
            <span class="glyphicon glyphicon-pencil"></span>
          </a>
        </td>
        <td>
          <a href="clients/delete/{{$client->id}}" class="btn btn-default" role="button">
            <span class="glyphicon glyphicon-remove"></span>
          </a>
        </td>
      </tr>
    @empty
      <h2>Il n'y a encore aucun client enregistré.</h2>
    @endforelse
    </table>
  </div>

@endsection
