<!DOCTYPE html>
<html lang="fr">
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Interface de gestion</title>
    <script type="text/javascript" src="js/jquery-2.2.0.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/jquery.steps.js"></script>
    <link href="css/jquery.steps.css" rel="stylesheet">
    <script src="js/iconselect.js"></script>
    <script src="js/iscroll.js"></script>

		{!! Html::style('css/bootstrap.css') !!}
		{!! Html::style('css/bootstrap.min.css') !!}
		<!--[if lt IE 9]>
			{{ Html::style('https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js') }}
			{{ Html::style('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}
		<![endif]-->
		<style> textarea { resize: none; } </style>
	</head>
	<body>
    <a href="/"><img class="logo" src="/img/logo_fidelicious.png"></a>
    <hr />

    <h2>Bienvenue dans Fidelicio.us ! Veuillez prendre un instant pour personnaliser vos paramètres.</h2>

    <form id="wizard-form" action="/wizard" method="post">
      {{ Form::token() }}
      <div>
        <h3>Paramètres généraux</h3>
        <section>
          <label for="nom_jetons">Nom des jetons *</label>
          <input id="nom_jetons" name="nom_jetons" type="text" class="required"><br />
          <label for="nbr_max_jetons">Nombre maximum de jetons *</label>
          <input id="nbr_max_jetons" name="nbr_max_jetons" type="number" class="required"><br />
          <label for="nbr_max_bons">Nombre maximum de bons *</label>
          <input id="nbr_max_bons" name="nbr_max_bons" type="number" class="required"><br/>
        </section>

        <h3>Pictogrammes</h3>
        <section>
          <div class="col-sm-4 col-md-2">
            <div class="thumbnail">
              <label for="pictoach">Achat</label>
              <div id="pictoach" name="pictoach"></div>
              <input id="inputach" type="hidden" name="inputach" value="1">
            </div>
          </div>
          <div class="col-sm-4 col-md-2">
            <div class="thumbnail">
              <label for="pictoval">Coupon</label>
              <div id="pictoval"></div>
              <input type="hidden" name="inputval" id="inputval" value="1">
            </div>
          </div>
          <div class="col-sm-4 col-md-2">
            <div class="thumbnail">
              <label for="pictook">Validé</label>
              <div id="pictook"></div>
              <input type="hidden" name="inputok" id="inputok" value="1">
            </div>
          </div>
          <div class="col-sm-4 col-md-2">
            <div class="thumbnail">
              <label for="pictonok">A valider</label>
              <div id="pictonok"></div>
              <input type="hidden" name="inputnok" id="inputnok" value="1">
            </div>
          </div>
          <div class="col-sm-4 col-md-2">
            <div class="thumbnail">
              <label for="pictobon">Réduction</label>
              <div id="pictobon"></div>
              <input type="hidden" name="inputbon" id="inputbon" value="1">
            </div>
          </div>
        </section>

      </div>
    </form>
    <script type="text/javascript">
      var form = $("#wizard-form");
      form.validate({
          errorPlacement: function errorPlacement(error, element) { element.before(error); },
          rules: {
              nom_jetons: {
                  required: true
              }
          }
      });
      form.children("div").steps({
          headerTag: "h3",
          bodyTag: "section",
          transitionEffect: "slideLeft",
          onStepChanging: function (event, currentIndex, newIndex)
          {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
          },
          onFinishing: function (event, currentIndex)
          {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
          },
          onFinished: function (event, currentIndex)
          {
              form.submit();
          }
      });

      var iconAch;
      var iconVal;
      var iconOk;
      var iconNok;
      var iconBon;
      window.onload = function(){

        var pictoAch = document.getElementById('inputach');

        document.getElementById('pictoach').addEventListener('changed', function(e){
           pictoAch.value = iconAch.getSelectedValue();
        });

        var pictoVal = document.getElementById('inputval');

        document.getElementById('pictoval').addEventListener('changed', function(e){
           pictoVal.value = iconVal.getSelectedValue();
        });

        var pictoOk = document.getElementById('inputok');

        document.getElementById('pictook').addEventListener('changed', function(e){
           pictoOk.value = iconOk.getSelectedValue();
        });

        var pictoNok = document.getElementById('inputnok');

        document.getElementById('pictonok').addEventListener('changed', function(e){
           pictoNok.value = iconNok.getSelectedValue();
        });

        var pictoBon = document.getElementById('inputbon');

        document.getElementById('pictobon').addEventListener('changed', function(e){
           pictoBon.value = iconBon.getSelectedValue();
        });

        iconAch = new IconSelect("pictoach");

        var icons = [];
        icons.push({'iconFilePath':'img/default/give-money.png','iconValue':'img/default/give-money.png'});
        icons.push({'iconFilePath':'img/default/euro-currency-symbol.png','iconValue':'img/default/euro-currency-symbol.png'});
        icons.push({'iconFilePath':'img/default/coins.png','iconValue':'img/default/coins.png'});

        iconAch.refresh(icons);

        iconVal = new IconSelect("pictoval");

        var icons = [];
        icons.push({'iconFilePath':'img/default/giftbox.png','iconValue':'img/default/giftbox.png'});
        icons.push({'iconFilePath':'img/default/gift-sticker.png','iconValue':'img/default/gift-sticker.png'});
        icons.push({'iconFilePath':'img/default/get-gifts.png','iconValue':'img/default/get-gifts.png'});

        iconVal.refresh(icons);

        iconOk = new IconSelect("pictook");

        var icons = [];
        icons.push({'iconFilePath':'img/default/icon-done.png','iconValue':'img/default/icon-done.png'});
        icons.push({'iconFilePath':'img/default/mark-done.png','iconValue':'img/default/mark-done.png'});
        icons.push({'iconFilePath':'img/default/mark.png','iconValue':'img/default/mark.png'});

        iconOk.refresh(icons);

        iconNok = new IconSelect("pictonok");

        var icons = [];
        icons.push({'iconFilePath':'img/default/icon-notdone.png','iconValue':'img/default/icon-notdone.png'});
        icons.push({'iconFilePath':'img/default/mark-nok.png','iconValue':'img/default/mark-nok.png'});
        icons.push({'iconFilePath':'img/default/mark-notdone.png','iconValue':'img/default/mark-notdone.png'});

        iconNok.refresh(icons);

        iconBon = new IconSelect("pictobon");

        var icons = [];
        icons.push({'iconFilePath':'img/default/shop.png','iconValue':'img/default/shop.png'});
        icons.push({'iconFilePath':'img/default/scissors.png','iconValue':'img/default/scissors.png'});
        icons.push({'iconFilePath':'img/default/shopping.png','iconValue':'img/default/shopping.png'});

        iconBon.refresh(icons);
      }




    </script>

  </body>
</html>
