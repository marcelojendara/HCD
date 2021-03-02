<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantillasEco extends Model
{
  public $timestamps = false;
  protected $table = 'plantillas_eco';
  protected $fillable =[
    'nombre',
    'plantilla'

  ];
}
