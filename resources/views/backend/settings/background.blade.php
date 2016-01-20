@extends('backend.template')
@section('contenu')

<p><a href="/settings" class="btn btn-default" role="button">Retour</a></p>
<p><a href="background/add" class="btn btn-default" role="button">Ajouter un fond d'écran</a></p>
<hr>

  <div class="row">
  @forelse ($item_list as $bg)
  <div class="col-xs-6 col-md-3">
    <div class="thumbnail">
      <img src="/{{$bg->url}}">
    </div>
    <div class="caption">
      <h4>{{$bg->name}}</h4>
      <p><a href="background/active/{{$bg->id}}" class="btn btn-default" role="button">Choisir</a> <a href="background/delete/{{$bg->id}}" class="btn btn-default" role="button">Supprimer</a></p>
    </div>
  </div>
  @empty
    <h1>Aucun fond d'écran n'a encore été ajouté.</h1>
  @endforelse
</div>







@endsection
