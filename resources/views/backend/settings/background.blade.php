@extends('backend.template')
@section('contenu')

<p><a href="/settings" class="btn btn-default" role="button">Retour</a></p>
<p><a href="background/add" class="btn btn-default" role="button">Ajouter un fond d'écran</a></p>
<hr>

  <div class="row">
  @forelse ($item_list as $bg)
  <div class="col-xs-6 col-md-3">
    <div class="thumbnail">
      <img src="/{{$bg->thumb_url}}">
    </div>
    <div class="caption">
      @if ($bg->actif)
        <p><a href="background/active/{{$bg->id}}" class="btn btn-default" role="button" disabled>Actif</a> <a href="background/delete/{{$bg->id}}" class="btn btn-default" role="button">Supprimer</a></p>
      @else
        <p><a href="background/active/{{$bg->id}}" class="btn btn-default" role="button">Choisir</a> <a href="background/delete/{{$bg->id}}" class="btn btn-default" role="button">Supprimer</a></p>
      @endif
    </div>
  </div>
  @empty
    <h1>Aucun fond d'écran n'a encore été ajouté.</h1>
  @endforelse
</div>







@endsection
