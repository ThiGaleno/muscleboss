<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $timestamps = false;

    protected $table = 'clients';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'birth_date', 'gender', 'adress_id', 'phone_id', 'salesman_id'];
}
