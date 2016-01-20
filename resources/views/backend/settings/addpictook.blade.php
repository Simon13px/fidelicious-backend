@extends('backend.template')
@section('contenu')

  {!! Form::open(['method' => 'POST', 'url' => 'settings/pictook/add', 'class' => 'form-horizontal','files'=>true]) !!}

      <div class="form-group">
          {!! Form::label('pictook', 'Choisir un fichier ..', ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-sm-2">
            {!! Form::file('pictook', ['class' => 'required']) !!}
            {{-- <p class="help-block">Help block text</p> --}}
            <small class="text-danger">{{ $errors->first('file') }}</small>
          </div>
      </div>
      <div class="form-group">
          {!! Form::label('name', 'Nom du fichier', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-2">
            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('name') }}</small>
        </div>
      </div>

      <div class="btn-group pull-center">
          {!! Form::submit("Valider", ['class' => 'btn btn-success']) !!}
      </div>

  {!! Form::close() !!}
@endsection
