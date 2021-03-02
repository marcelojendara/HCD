<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblCNV extends Model
{
  protected $connection = 'sqlsrvSalud';

protected $table = 'tblCNV';


  protected $fillable =[
    'NOMBRECNV'
    ,'CODIGOSISALUD'

  ];

}
