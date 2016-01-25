<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model {

	protected $table = 'produits';
	public $timestamps = true;
	protected $fillable = array('label', 'user_id');

	public function ventes()
	{
		return $this->hasMany('App\Vente');
	}

	public function user(){
		return $this->hasOne('App\User');
	}
}
