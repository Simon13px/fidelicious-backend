@extends('backend.template')
@section('contenu')

<p><a href="/settings" class="btn btn-default" role="button">Retour</a></p>
<p><a href="logo/add" class="btn btn-default" role="button">Ajouter un logo</a></p>
<hr>

  <div class="row">
  @forelse ($item_list as $logo)
  <div class="col-xs-6 col-md-3">
    <div class="thumbnail">
      <img src="/{{$logo->thumb_url}}">
    </div>
    <div class="caption">
      @if ($logo->actif)
        <p><a href="logo/active/{{$logo->id}}" class="btn btn-default" role="button" disabled>Actif</a> <a href="logo/delete/{{$logo->id}}" class="btn btn-default" role="button">Supprimer</a></p>
      @else
        <p><a href="logo/active/{{$logo->id}}" class="btn btn-default" role="button">Choisir</a> <a href="logo/delete/{{$logo->id}}" class="btn btn-default" role="button">Supprimer</a></p>
      @endif
    </div>
  </div>
  @empty
    <h1>Aucun logo n'a encore été ajouté.</h1>
  @endforelse
</div>







@endsection
