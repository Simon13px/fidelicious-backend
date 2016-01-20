<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {

	protected $table = 'settings';
	public $timestamps = true;
	protected $fillable = array('nbr_max_bons', 'nbr_max_jetons', 'nom_app', 'nom_jetons');

}