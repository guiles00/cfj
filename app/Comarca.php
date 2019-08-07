<?php namespace App;
//modifico otro archivo
use Illuminate\Database\Eloquent\Model;

class Comarca extends Model {

	//
		 protected $table = 'comarca';

		 function hobbit(){
		 	$this->belongsTo('\App\Hobbit');
		 }
}
