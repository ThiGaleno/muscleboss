<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salesman extends Model
{
    public $timestamps = false;

    protected $table = 'salesmen';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'password', 'profile'];
}
