<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EspecialidadTurno extends Model
{

  protected $connection = 'sqlsrvSalud';

protected $table = 'tblEspecialidades';


  protected $fillable =[
      'ID'
      ,'NOMBRE'
      ,'SERVICIO'
  ];

}
