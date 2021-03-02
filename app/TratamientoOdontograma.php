<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TratamientoOdontograma extends Model
{
  protected $fillable =[
    'odontograma_id',
    'lado',
    'numero',
    'control'
  ];
}
