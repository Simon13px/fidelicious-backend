<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model {

	protected $table = 'produits';
	public $timestamps = true;
	protected $fillable = array('label');

	public function ventes()
	{
		return $this->hasMany('App\Vente');
	}

}