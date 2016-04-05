@extends('backend.template')
@section('contenu')

  <hr>
  <p><h1>Résumé des paramètres</h1></p>
  <hr>

  <h2>Paramètres généraux</h2>
  <p>Nom des jetons : <strong>{{$params->nom_jetons}}</strong></p>
  <p>Nombre maximum de jetons : <strong>{{$params->nbr_max_jetons}}</strong></p>
  <p>Nombre maximum de bons : <strong>{{$params->nbr_max_bons}}</strong></p>
  <p><a href="settings/general" class="btn btn-default" role="button">Modifier</a></p>


  <br>
  <h2>Images actives</h2>

  <div class="row">
    <div class="row col-eq-img">
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="{{$background->thumb_url}}">
          <div class="caption">
            <h3>Fond d'écran actif</h3>
            <p>Cette image est affichée en arrière plan de l'application.</p>
            <p><a href="settings/background" class="btn btn-default" role="button">Modifier</a></p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img src="{{$logo->thumb_url}}">
          <div class="caption">
            <h3>Logo actif</h3>
            <p>Cette image représente votre logo dans les pages de l'application.</p>
            <p><a href="settings/logo" class="btn btn-default" role="button">Modifier</a></p>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img src="{{$pub->thumb_url}}">
          <div class="caption">
            <h3>Pub active</h3>
            <p>Cette image représente la pub qui sera affichée dans l'application.</p>
            <p><a href="settings/pub" class="btn btn-default" role="button">Modifier</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <br>
  <h2>Pictogrammes actifs</h2>

  <div class="row">
    <div class="col-sm-4 col-md-2 ">
      <div class="thumbnail">
        <img src="{{$pictoval->thumb_url}}">
        <div class="caption">
          <h3>Valider</h3>
          <p>Cette image représente le pictogramme pour l'action Valider.</p>
          <p><a href="settings/pictoval" class="btn btn-default" role="button">Modifier</a></p>
        </div>
      </div>
    </div>
    <div class="col-sm-4 col-md-2">
      <div class="thumbnail">
        <img src="{{$pictoach->thumb_url}}">
        <div class="caption">
          <h3>Acheter</h3>
          <p>Cette image représente le pictogramme pour l'action Acheter.</p>
          <p><a href="settings/pictoach" class="btn btn-default" role="button">Modifier</a></p>
        </div>
      </div>
    </div>
    <div class="col-sm-4 col-md-2">
      <div class="thumbnail">
        <img src="{{$pictook->thumb_url}}">
        <div class="caption">
          <h3>Jeton OK</h3>
          <p>Cette image représente le pictogramme pour les jetons validés.</p>
          <p><a href="settings/pictook" class="btn btn-default" role="button">Modifier</a></p>
        </div>
      </div>
    </div>
    <div class="col-sm-4 col-md-2">
      <div class="thumbnail">
        <img src="{{$pictonok->thumb_url}}">
        <div class="caption">
          <h3>Jeton restant</h3>
          <p>Cette image représente le pictogramme pour les jetons restants.</p>
          <p><a href="settings/pictonok" class="btn btn-default" role="button">Modifier</a></p>
        </div>
      </div>
    </div>
    <div class="col-sm-4 col-md-2">
      <div class="thumbnail">
        <img src="{{$pictobon->thumb_url}}">
        <div class="caption">
          <h3>Coupon de réduction</h3>
          <p>Cette image représente le pictogramme pour le coupon de réduction.</p>
          <p><a href="settings/pictobon" class="btn btn-default" role="button">Modifier</a></p>
        </div>
      </div>
    </div>
  </div>
    
@endsection
