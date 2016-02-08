<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vente extends Model {

	protected $table = 'ventes';
	public $timestamps = true;
	protected $fillable = array('client_id', 'vendeur_id', 'produit_id', 'user_id', 'count', 'discount');

	public function client()
	{
		return $this->hasOne('App\Client', 'client_id');
	}

	public function vendeur()
	{
		return $this->hasOne('App\Vendeur', 'vendeur_id');
	}

	public function produit()
	{
		return $this->hasOne('App\Produit', 'produit_id');
	}

	public function user(){
		return $this->hasOne('App\User');
	}

}
