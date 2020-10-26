<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    public $timestamps = false;

    protected $table = 'adresses';
    protected $primaryKey = 'id';
    protected $fillable = ['state', 'city', 'street', 'zip_code', 'number'];
}
