<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendeur extends Model {

	protected $table = 'vendeurs';
	public $timestamps = true;
	protected $fillable = array('prenom', 'nom', 'code', 'cpt_ventes','user_id');

	public function ventes()
	{
		return $this->hasMany('App\Vente');
	}

	public function user(){
		return $this->hasOne('App\User');
	}

}
