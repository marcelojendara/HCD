<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calle extends Model
{

  protected $connection = 'sqlsrvSalud';

protected $table = 'vCalles';


  protected $fillable =[
      'ID'
      ,'Nombre'
      ,'NombreAb'
      ,'Predeterminado'
      ,'Calle_Codigo'
      ,'Calle_Google'
      ,'Calle_Nombre'
      ,'Calle_Calle'
      ,'SinonimoG'
  ];

}
