@extends('backend.template')
@section('contenu')

  <p><a href="/clients/add" class="btn btn-default">Ajouter un client</a></p>

  <h2>Liste des clients enregistrés</h2>
  <div class="navbar navbar-default">
    <ul class="nav nav-tabs">
      <li role="presentation"><a href="/clients">Tous les clients</a></li>
      <li role="presentation" class="active"><a href="listbon">Clients avec un bon</a></li>
      <li role="presentation"><a href="/clients/confirmed">Clients confirmés</a></li>
    </ul>
    <br>
    <p>{{$count}} clients possèdent au moins un bon.</p>
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
          {{$client->GSM}}
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
      <h2>Aucun client ne répond aux critères.</h2>
    @endforelse
    </table>
  </div>

@endsection
