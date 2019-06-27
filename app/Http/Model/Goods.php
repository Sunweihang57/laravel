<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
	public $timestamps=false;
	protected $connection='nginx';
	protected $table='goods';
	protected $primaryKey='id';

    // protected $table='user';
    // protected $connection='nginx';
    // public $timestamps=false;
    // protected $primaryKey='id';
}
