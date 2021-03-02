<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nacionalidad extends Model
{

  protected $connection = 'sqlsrvSalud';

protected $table = 'Nacional';


  protected $fillable =[
      'NA_COD'
      ,'NA_DETALLE'
      ,'NA_CODOP'
      ,'NA_MODIF'

  ];

}
