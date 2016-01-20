@extends('backend.template')
@section('contenu')

<h1>Modification d'un client</h1>
<hr>

  {!! Form::open(['method' => 'POST', 'url' => 'clients/edit', 'class' => 'form-horizontal']) !!}

      <div class="form-group">
          {!! Form::label('prenom', 'Prénom :', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('prenom', $client->prenom, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('prenom') }}</small>
        </div>
      </div>
      <div class="form-group">
          {!! Form::label('nom', 'Nom :', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('nom',$client->nom, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('nom') }}</small>
        </div>
      </div>
      <div class="form-group">
          {!! Form::label('email', 'Email :', ['class' =>'col-sm-2 control-label']) !!}
          <div class="col-sm-3">
            {!! Form::email('email',$client->email, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com']) !!}
            <small class="text-danger">{{ $errors->first('email') }}</small>
        </div>
      </div>
      <div class="form-group">
          {!! Form::label('gsm', 'GSM :', ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-sm-3">
            {!! Form::number('gsm', $client->GSM, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('gsm') }}</small>
        </div>
      </div>
      <div class="form-group">
          {!! Form::label('cp', 'Code Postal :', ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-sm-3">
            {!! Form::number('cp', $client->cp, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('cp') }}</small>
        </div>
      </div>
      <div class="form-group">
          {!! Form::label('rue', 'Rue :', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('rue', $client->rue, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('rue') }}</small>
        </div>
      </div>
      <div class="form-group">
          {!! Form::label('ville', 'Ville :', ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-3">
            {!! Form::text('ville', $client->ville, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('ville') }}</small>
        </div>
      </div>
      <div class="form-group">
          {!! Form::label('jetons', 'Jetons validés :', ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-sm-3">
            {!! Form::number('jetons',$client->cpt_jetons, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('jetons') }}</small>
        </div>
      </div>
      <div class="form-group">
          {!! Form::label('bons', 'Bons restants :', ['class' => 'col-sm-2 control-label']) !!}
          <div class="col-sm-3">
            {!! Form::number('bons',$client->bons_restants, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('bons') }}</small>
        </div>
      </div>
      <div class="btn-group pull-left">
          {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}
          {!! Form::submit("Créer", ['class' => 'btn btn-success']) !!}
      </div>
  {!! Form::close() !!}


@endsection
