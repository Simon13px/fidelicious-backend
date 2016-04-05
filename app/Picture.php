<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model {

	protected $table = 'pictures';
	public $timestamps = true;
	protected $fillable = array('type', 'actif', 'nom', 'url', 'user_id', 'thumb_url','defaultpic');

	public function user(){
		return $this->hasOne('App\User');
	}

}
