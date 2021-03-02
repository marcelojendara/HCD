<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{

  protected $connection = 'sqlsrvSalud';

protected $table = 'tblDependencias';


  protected $fillable =[
      'ID'
      ,'NOMBRE'
      ,'DIRECCION'
      ,'TELEFONOS'
      ,'AREA'
      ,'LEGAJORESP'
      ,'ESTABLECIMIENTO'
      ,'NOMBREABR'
      ,'VACUNATORIO'
      ,'EXTERNO'
      ,'SERVICIOS'
      ,'FECHADESDE'
      ,'IDCalle'
      ,'Numero'
      ,'Turnos'
      ,'geo'
      ,'deleg'
      ,'HORARIO'
      ,'ACTIVO'
  ];

}
