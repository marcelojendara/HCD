<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barrio extends Model
{

  protected $connection = 'sqlsrvSalud';

protected $table = 'vBarrios';


  protected $fillable =[
      'ID'
    ,'Nombre'
    ,'NombreAb'
    ,'Predeterminado'
  ];

}
