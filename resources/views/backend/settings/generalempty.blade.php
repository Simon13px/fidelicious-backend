@extends('backend.template')
@section('contenu')

  <h1>Paramètres généraux</h1>
  <hr>


  {!! Form::open(['method' => 'POST', 'url' => 'settings/general', 'class' => 'form-horizontal']) !!}


      <div class="form-group">
          {!! Form::label('nom_app', 'Nom de l\'application', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-2">
            {!! Form::text('nom_app', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('nom_app') }}</small>
        </div>
      </div>
      <div class="form-group">
          {!! Form::label('nom_jetons', 'Nom des jetons :', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-2">
            {!! Form::text('nom_jetons', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('nom_jetons') }}</small>
        </div>
      </div>
      <div class="form-group">
          {!! Form::label('max_jetons', 'Nombre maximum de jetons :', ['class' => 'col-sm-3 control-label']) !!}
          <div class="col-sm-1">
            {!! Form::number('max_jetons', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('max_jetons') }}</small>
        </div>
      </div>
      <div class="form-group">
          {!! Form::label('max_bons', 'Nombre maximum de bons :', ['class' => 'col-sm-3 control-label']) !!}
          <div class="col-sm-1">
            {!! Form::number('max_bons', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('max_bons') }}</small>
        </div>
      </div>

      <div class="btn-group pull-left">
          {!! Form::submit("Valider", ['class' => 'btn btn-success']) !!}
      </div>

  {!! Form::close() !!}

@endsection
