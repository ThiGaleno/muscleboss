<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    public $timestamps = false;

    protected $table = 'phones';
    protected $primaryKey = 'id';
    protected $fillable = ['landline', 'mobile',];
}
