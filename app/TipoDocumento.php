<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
  protected $connection = 'sqlsrvSalud';

protected $table = 'vTipoDoc';


  protected $fillable =[
    'ID'
    ,'Nombre'
    ,'Codigo'
    ,'Predeterminado'
    ,'HSE'

  ];
}
