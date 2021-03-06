@extends('backend.template')
@section('contenu')

<h1>Création d'un vendeur</h1>
<hr>

  {!! Form::open(['method' => 'POST', 'url' => 'vendeurs/add', 'class' => 'form-horizontal']) !!}

      <div class="form-group">
          {!! Form::label('prenom', 'Prénom :', ['class' => 'col-sm-1 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('prenom', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('prenom') }}</small>
        </div>
      </div>
      <div class="form-group">
          {!! Form::label('nom', 'Nom :', ['class' => 'col-sm-1 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('nom', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('nom') }}</small>
        </div>
      </div>
      <div class="form-group">
          {!! Form::label('code', 'Code :', ['class' => 'col-sm-1 control-label']) !!}
          <div class="col-sm-3">
            {!! Form::number('code', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('code') }}</small>
        </div>
      </div>

      <div class="btn-group pull-left">
          {!! Form::submit("Créer", ['class' => 'btn btn-success']) !!}
      </div>

  {!! Form::close() !!}









@endsection
