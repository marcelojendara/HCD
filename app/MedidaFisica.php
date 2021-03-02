<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedidaFisica extends Model
{
  protected $connection = 'sqlsrvSalud';

protected $table = 'TblMedidasFisicas';


  protected $fillable =[
    'NOMBRE'
      ,'ABREVIACION'
      ,'UNIDADMEDIDA'
      ,'DESDE'
      ,'HASTA'
  ];
}
