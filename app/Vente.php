<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vente extends Model {

	protected $table = 'ventes';
	public $timestamps = true;
	protected $fillable = array('FK_client_id', 'FK_vendeur_id', 'FK_produit_id', 'user_id', 'count');

	public function client()
	{
		return $this->hasOne('App\Client', 'FK_client_id');
	}

	public function vendeur()
	{
		return $this->hasOne('App\Vendeur', 'FK_vendeur_id');
	}

	public function produit()
	{
		return $this->hasOne('App\Produit', 'FK_produit_id');
	}

	public function user(){
		return $this->hasOne('App\User');
	}

}
