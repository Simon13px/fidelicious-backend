<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {

	protected $table = 'clients';
	public $timestamps = true;
	protected $fillable = array('prenom', 'nom', 'gsm', 'email', 'cp', 'rue', 'ville', 'cpt_jetons', 'cpt_visites', 'cpt_cartes_remplies', 'bons_restants', 'confirme', 'user_id');

	public function ventes()
	{
		return $this->hasMany('App\Client');
	}

	public function user(){
		return $this->hasOne('App\User');
	}

}
