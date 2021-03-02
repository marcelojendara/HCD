<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EcografiaImagen extends Model
{
  protected $table = 'ecografia_images';
  protected $fillable =[
      'eco_id'
      ,'imagen'
    ,'informe'

  ];
}
