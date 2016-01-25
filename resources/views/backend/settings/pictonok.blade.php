@extends('backend.template')
@section('contenu')

<p><a href="/settings" class="btn btn-default" role="button">Retour</a></p>
<p><a href="pictonok/add" class="btn btn-default" role="button">Ajouter un pictogramme</a></p>
<hr>

  <div class="row">
  @forelse ($item_list as $pictonok)
  <div class="col-xs-6 col-md-3">
    <div class="thumbnail">
      <img src="/{{$pictonok->thumb_url}}">
    </div>
    <div class="caption">
      @if ($pictonok->actif)
        <p><a href="pictonok/active/{{$pictonok->id}}" class="btn btn-default" role="button" disabled>Actif</a> <a href="pictonok/delete/{{$pictonok->id}}" class="btn btn-default" role="button">Supprimer</a></p>
      @else
        <p><a href="pictonok/active/{{$pictonok->id}}" class="btn btn-default" role="button">Choisir</a> <a href="pictonok/delete/{{$pictonok->id}}" class="btn btn-default" role="button">Supprimer</a></p>
      @endif
    </div>
  </div>
  @empty
    <h1>Aucun pictogramme correspondant n'a encore été ajouté.</h1>
  @endforelse
</div>







@endsection
