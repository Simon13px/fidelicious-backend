@extends('backend.template')
@section('contenu')

<p><a href="/settings" class="btn btn-default" role="button">Retour</a></p>
<p><a href="pictoach/add" class="btn btn-default" role="button">Ajouter un pictogramme</a></p>
<hr>

  <div class="row">
  @forelse ($item_list as $pictoach)
  <div class="col-xs-6 col-md-3">
    <div class="thumbnail">
      <img src="/{{$pictoach->thumb_url}}">
    </div>
    <div class="caption">
      @if ($pictoach->actif)
        <p><a href="pictoach/active/{{$pictoach->id}}" class="btn btn-default" role="button" disabled>Actif</a> <a href="pictoach/delete/{{$pictoach->id}}" class="btn btn-default" role="button">Supprimer</a></p>
      @else
        <p><a href="pictoach/active/{{$pictoach->id}}" class="btn btn-default" role="button">Choisir</a> <a href="pictoach/delete/{{$pictoach->id}}" class="btn btn-default" role="button">Supprimer</a></p>
      @endif
    </div>
  </div>
  @empty
    <h1>Aucun pictogramme correspondant n'a encore été ajouté.</h1>
  @endforelse
</div>







@endsection
