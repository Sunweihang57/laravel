<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table='user';
    protected $connection='nginx';
    public $timestamps=false;
    protected $primaryKey='id';
}
