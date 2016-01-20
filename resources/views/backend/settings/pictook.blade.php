@extends('backend.template')
@section('contenu')

<p><a href="/settings" class="btn btn-default" role="button">Retour</a></p>
<p><a href="pictook/add" class="btn btn-default" role="button">Ajouter un pictogramme</a></p>
<hr>

  <div class="row">
  @forelse ($item_list as $pictook)
  <div class="col-xs-6 col-md-3">
    <div class="thumbnail">
      <img src="/{{$pictook->url}}">
    </div>
    <div class="caption">
      <h4>{{$pictook->name}}</h4>
      <p><a href="pictook/active/{{$pictook->id}}" class="btn btn-default" role="button">Choisir</a> <a href="pictook/delete/{{$pictook->id}}" class="btn btn-default" role="button">Supprimer</a></p>
    </div>
  </div>
  @empty
    <h1>Aucun pictogramme correspondant n'a encore été ajouté.</h1>
  @endforelse
</div>







@endsection
