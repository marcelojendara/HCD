<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{

  protected $connection = 'sqlsrvSalud';

protected $table = 'diagnostico';


  protected $fillable =[
    'DI_CODIGO'
      ,'Diagnostico'
      ,'CEPS_AP'
      ,'TIPO'
      ,'SUBTIPO'
      ,'UNIDAD'
      ,'OBSERVACION'
      ,'ENO'
      ,'CLASIFICACION'
      ,'SELECCIONABLE'
      ,'TIPOENO'
      ,'PERIODICIDAD'
      ,'VERMAPA'
      ,'FACTURA'
      ,'CODIGOFAC'
  ];

}
