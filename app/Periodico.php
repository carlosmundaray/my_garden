<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodico extends Model
{
        protected $fillable = [
        'name', 'img','pdf', 'fecha_active','status'
    ];
}
