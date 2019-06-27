<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    protected $connection = 'nginx';
    protected $table = 'order';
    protected $primaryKey = 'id';
}
