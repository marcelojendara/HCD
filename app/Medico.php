<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{

  protected $connection = 'sqlsrvSalud';

protected $table = 'medicos';


  protected $fillable =[
      'ME_MAT'
      ,'ME_APENOM'
      ,'ME_ESPEC'
      ,'ME_RADIO'
      ,'ME_MEDNUE'
      ,'LOGIN'
      ,'LEGAJO'
  ];

  public function especialidad()
   {
       return $this->belongsTo('App\Especialidad','ME_ESPEC','ES_COD');//muchos a uno
   }

}
