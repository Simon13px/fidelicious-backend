@extends('backend.template')

@section('contenu')
    <br>

    <h1> Gestion </h1>
    <hr>

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <ul class="list-inline nav navbar-nav">
        <li><a href="vendeurs">Vendeurs</a></li>
        <li><a href="clients">Clients</a></li>
        <li><a href="settings">Paramètres</a></li>
        <li><a href="stats">Statistiques</a></li>
      </ul>
    </div>
  </nav>

  <p><h2>Bienvenue sur la partie gestion de l'application. D'ici vous pouvez accéder aux différents paramètres pour personnaliser l'application.</h2><p>
  <br>
  <p><h3>Le menu Vendeurs permet de voir une liste des vendeurs déjà enregistrés, ainsi que d'en recréer ou d'en modifier.</h3></p>
  <p><h3>Le menu Clients permet de voir une liste des clients enregistrés selon différents filtres, ainsi que d'en recréer ou d'en modifier.</h3></p>
  <p><h3>Le menu Paramètres permet de configurer différents paramètres de configuration comme le nom de l'application, le nombre de jetons maximum, les
    différentes images à utiliser,...</h3></p>
  <p><h3>Le menu Statistiques permet d'afficher différentes statistiques à propos de l'utilisation de l'application.</h3></p>




@stop
