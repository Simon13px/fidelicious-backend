@extends('backend.template')
@section('contenu')

<p><a href="/settings" class="btn btn-default" role="button">Retour</a></p>
<p><a href="pictoval/add" class="btn btn-default" role="button">Ajouter un pictogramme</a></p>
<hr>

  <div class="row">
  @forelse ($item_list as $pictoval)
  <div class="col-xs-6 col-md-3">
    <div class="thumbnail">
      <img src="/{{$pictoval->url}}">
    </div>
    <div class="caption">
      <h4>{{$pictoval->name}}</h4>
      <p><a href="pictoval/active/{{$pictoval->id}}" class="btn btn-default" role="button">Choisir</a> <a href="pictoval/delete/{{$pictoval->id}}" class="btn btn-default" role="button">Supprimer</a></p>
    </div>
  </div>
  @empty
    <h1>Aucun pictogramme correspondant n'a encore été ajouté.</h1>
  @endforelse
</div>







@endsection
