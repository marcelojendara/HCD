<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{

  protected $connection = 'sqlsrvSalud';

protected $table = 'provin';


  protected $fillable =[
      'PR_COD'
      ,'PR_DETALLE'
      ,'PR_MODIF'
      ,'PR_CODOP'
  ];

}
