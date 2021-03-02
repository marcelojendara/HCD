<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TBLUsuario extends Model
{
  protected $connection = 'sqlsrvSalud';

protected $table = 'tblUsuarios';


  protected $fillable =[
    'LEGAJO'
    ,'NOMBRE'
    ,'TIPO'
    ,'ACTIVO'
    ,'CLAVE'
    ,'OFICINA'
    ,'AREA'
    ,'FUNCION'
    ,'MATRICULA'
    ,'TBC'
    ,'ADMSISALUD'
    ,'LOGIN'
    ,'TURNOS'
    ,'LEGAJOHOSPITAL'
    ,'PAPS'
  ];
}
