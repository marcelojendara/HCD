<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
  protected $connection = 'sqlsrvSalud';

protected $table = 'Especial';


  protected $fillable =[
      'ES_COD'
      ,'ES_DETALLE'
      ,'ES_GUARDIA'
      ,'IDESPECIALIDAD'
      ,'activo'
  ];

}
