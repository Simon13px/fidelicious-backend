<?php
use Symfony\Component\HttpKernel\EventListener\DebugHandlersListener;

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/test', 'TestController@index');


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', ['middleware'=>'auth', function(){
      return view('backend.index');
    }]);
    Route::get('/home', function(){
      return redirect('/');
    });
    Route::get('/backend', function(){
      return redirect('/');
    });

    //Partie Paramètres
    Route::get('/settings','SettingsController@index');
    Route::get('/settings/general','SettingsController@getGeneral');
    Route::post('/settings/general','SettingsController@postGeneral');
    Route::get('/settings/{item}',['as'=>'settingsItem','uses'=>'SettingsController@getItemList']);
    Route::get('/settings/{item}/add','SettingsController@getAddItem');
    Route::post('settings/{item}/add','SettingsController@postAddItem');
    Route::get('settings/{item}/active/{id}','SettingsController@activeItem')->where('id', '[0-9]+');
    Route::get('settings/{item}/delete/{id}','SettingsController@deleteItem')->where('id', '[0-9]+');

    //Partie Vendeurs
    Route::get('/vendeurs','VendeursController@index');
    Route::get('/vendeurs/add',function(){
      return view('backend.vendeurs.add');
    });
    Route::post('/vendeurs/add','VendeursController@postAdd');
    Route::get('/vendeurs/edit/{id}','VendeursController@getEdit');
    Route::post('/vendeurs/edit','VendeursController@postEdit');
    Route::get('/vendeurs/delete/{id}', 'VendeursController@delete');

    ///// CLIENTS /////
    Route::get('/clients','ClientsController@index');
    Route::get('/clients/listbon','ClientsController@listingBon');
    Route::get('/clients/add',function(){
      return view('backend.clients.add');
    });
    Route::post('/clients/add','ClientsController@postAdd');
    Route::get('/clients/edit/{id}','ClientsController@getEdit');
    Route::post('/clients/edit','ClientsController@postEdit');
    Route::get('/clients/delete/{id}','ClientsController@delete');

    ///// STATS /////
    Route::get('/stats','StatsController@index');
    Route::get('/stats/ventes/sandwiches','StatsController@ventes_sandwiches');
    Route::get('/stats/vendeurs','StatsController@vendeurs');
    Route::get('/stats/clients','StatsController@clients');
    Route::get('/stats/ventes','StatsController@index');
    Route::get('/stats/vendeurs/ventes','StatsController@ventes_vendeurs');
    Route::get('/stats/vendeurs/sandwiches','StatsController@vendeurs_sandwiches');
    Route::get('/stats/clients/visites','StatsController@visites_clients');
    Route::get('/stats/vendeurs/discount','StatsController@vendeurs_discount');
});
