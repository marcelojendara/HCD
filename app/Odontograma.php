<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Odontograma extends Model
{
  protected $fillable =[
    'paciente_id',
    'fecha_operacion'
    ,'TU_MEDICO'
    ,'TU_ESPEC'
    ,'TU_CODOS'
    ,'IDDependencia'
  ];

  public function medico_turno()
   {
    // return \App\Medico::Where(DB::raw("TRIM(ME_MAT)"), $this->userid)->get();
       return $this->belongsTo('App\Medico','TU_MEDICO',TRIM('ME_MAT'));//muchos a uno
   }

   public function consulta_especialidad()
    {
        return $this->belongsTo('App\EspecialidadTurno','TU_ESPEC','ID');//muchos a uno
    }

    public function consulta_obrasocial()
     {
         return $this->belongsTo('App\Obrasocial','TU_CODOS','OB_COD');//muchos a uno
     }
     public function consulta_dependencia()
      {
          return $this->belongsTo('App\Dependencia','IDDependencia','ID');//muchos a uno
      }
      public function tratamiento_odontograma(){

        return $this->HasMany('App\TratamientoOdontograma', 'odontograma_id','id');
      }

}
