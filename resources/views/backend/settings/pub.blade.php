@extends('backend.template')
@section('contenu')

<p><a href="/settings" class="btn btn-default" role="button">Retour</a></p>
<p><a href="pub/add" class="btn btn-default" role="button">Ajouter une pub</a></p>
<hr>

  <div class="row">
  @forelse ($item_list as $pub)
  <div class="col-xs-6 col-md-3">
    <div class="thumbnail">
      <img src="/{{$pub->url}}">
    </div>
    <div class="caption">
      <h4>{{$pub->name}}</h4>
      <p><a href="pub/active/{{$pub->id}}" class="btn btn-default" role="button">Choisir</a> <a href="pub/delete/{{$pub->id}}" class="btn btn-default" role="button">Supprimer</a></p>
    </div>
  </div>
  @empty
    <h1>Aucune pub n'a encore été ajoutée.</h1>
  @endforelse
</div>







@endsection
