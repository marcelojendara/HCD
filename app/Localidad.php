<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{

  protected $connection = 'sqlsrvSalud';

protected $table = 'Locali';


  protected $fillable =[
      'LO_COD'
      ,'LO_DETALLE'
      ,'LO_CODPOS'
      ,'LO_CODOP'
      ,'LO_MODIF'
      ,'Mostrar'
  ];

}
