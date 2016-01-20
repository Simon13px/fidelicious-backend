<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendeur extends Model {

	protected $table = 'vendeurs';
	public $timestamps = true;
	protected $fillable = array('prenom', 'nom', 'code', 'cpt_ventes');

	public function ventes()
	{
		return $this->hasMany('App\Vente');
	}

}