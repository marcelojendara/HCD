<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsultaDiagnostico extends Model
{
public $timestamps = false;
  protected $connection = 'sqlsrvSalud';

protected $table = 'Turnos_C_DIAG';


  protected $fillable =[
      'ID_TURNO_C'
      ,'TU_DIAG'
  ];

  public function diagnostico()
   {
       return $this->belongsTo('App\Diagnostico','TU_DIAG','DI_CODIGO');//muchos a uno
   }
   public function turno()
    {
        return $this->belongsTo('App\ConsultaTurno','ID_TURNO_C','IDTurno_C');//muchos a uno
    }
    public function turno2()
     {
         return $this->belongsTo('App\ConsultaTurno','ID_TURNO_C','IDTurno_C')->select(array('IDTurno_C', 'IDDependencia', 'IDPaciente'));//muchos a uno
     }

}
