<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obrasocial extends Model
{

  protected $connection = 'sqlsrvSalud';

protected $table = 'obrasoci';


  protected $fillable =[
      'OB_COD'
      ,'OB_NOM'
      ,'OB_SINON'
      ,'OB_DIRECC'
      ,'OB_CUIT'
      ,'OB_DGI'
      ,'OB_SUBCOD'
      ,'OB_COSEG'
      ,'ACTIVA'
  ];

}
