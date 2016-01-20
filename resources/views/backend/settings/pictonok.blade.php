@extends('backend.template')
@section('contenu')

<p><a href="/settings" class="btn btn-default" role="button">Retour</a></p>
<p><a href="pictonok/add" class="btn btn-default" role="button">Ajouter un pictogramme</a></p>
<hr>

  <div class="row">
  @forelse ($item_list as $pictonok)
  <div class="col-xs-6 col-md-3">
    <div class="thumbnail">
      <img src="/{{$pictonok->url}}">
    </div>
    <div class="caption">
      <h4>{{$pictonok->name}}</h4>
      <p><a href="pictonok/active/{{$pictonok->id}}" class="btn btn-default" role="button">Choisir</a> <a href="pictonok/delete/{{$pictonok->id}}" class="btn btn-default" role="button">Supprimer</a></p>
    </div>
  </div>
  @empty
    <h1>Aucun pictogramme correspondant n'a encore été ajouté.</h1>
  @endforelse
</div>







@endsection
