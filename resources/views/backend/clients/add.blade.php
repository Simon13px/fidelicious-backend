@extends('backend.template')
@section('contenu')

<h1>Création d'un client</h1>
<hr>

  {!! Form::open(['method' => 'POST', 'url' => 'clients/add', 'class' => 'form-horizontal']) !!}

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
          {!! Form::label('email', 'Email :', ['class' =>'col-sm-1 control-label']) !!}
          <div class="col-sm-3">
            {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com']) !!}
            <small class="text-danger">{{ $errors->first('email') }}</small>
        </div>
      </div>
      <div class="form-group">
          {!! Form::label('gsm', 'GSM :', ['class' => 'col-sm-1 control-label']) !!}
          <div class="col-sm-3">
            {!! Form::number('gsm', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('gsm') }}</small>
        </div>
      </div>
      <div class="form-group">
          {!! Form::label('cp', 'Code Postal :', ['class' => 'col-sm-1 control-label']) !!}
          <div class="col-sm-3">
            {!! Form::number('cp', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('cp') }}</small>
        </div>
      </div>
      <div class="form-group">
          {!! Form::label('rue', 'Rue :', ['class' => 'col-sm-1 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('rue', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('rue') }}</small>
        </div>
      </div>
      <div class="form-group">
          {!! Form::label('ville', 'Ville :', ['class' => 'col-sm-1 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('ville', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('ville') }}</small>
        </div>
      </div>
      <div class="btn-group pull-left">
          {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}
          {!! Form::submit("Créer", ['class' => 'btn btn-success']) !!}
      </div>

  {!! Form::close() !!}


@endsection
