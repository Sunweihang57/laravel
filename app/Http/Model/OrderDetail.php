<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public $timestamps = false;
    protected $connection = 'nginx';
    protected $table = 'order_detail';
    protected $primaryKey = 'id';
}
