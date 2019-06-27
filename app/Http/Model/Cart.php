<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	public $timestamps=false;
	protected $table='cart';
	protected $connection='nginx';
	protected $primaryKey='id';
	
    
}
