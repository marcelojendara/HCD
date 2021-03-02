<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsultaTurno extends Model
{
public $timestamps = false;
  protected $connection = 'sqlsrvSalud';
protected $primaryKey = 'IDTurno_C';
protected $table = 'Turnos_C';
protected $hidden = [
    'RowVersion'
];

  protected $fillable =[
      'FechaOperacion'
      ,'Login'
      ,'RowVersion'
      ,'IDTurno_C'
      ,'IDPaciente'
      ,'TU_FECHA'
      ,'TU_HORA'
      ,'TU_MEDICO'
      ,'TU_ESPEC'
      ,'TU_CODOS'
      ,'TU_NROAFI'
      ,'TU_DIAG'
      ,'TU_PRIMVEZ'
      ,'IDACCIDENTE'
      ,'TU_SNarrativa'
      ,'TU_ONarrativa'
      ,'TU_ENarrativa'
      ,'TU_PNarrativa'
      ,'IDDependencia'
      ,'ORIGEN'
  ];

  public function medico_turno()
   {
       return $this->belongsTo('App\Medico','TU_MEDICO','ME_MAT');//muchos a uno
   }
   public function paciente_turno()
    {
        return $this->belongsTo('App\Paciente','IDPaciente','IDPaciente');//muchos a uno
    }
    public function paciente()
     {
         return $this->hasOne('App\Paciente','IDPaciente','IDPaciente')
         ->select(array('IDPaciente','PA_NOMBRE','PA_APELLIDO','PA_FECNAC','PA_SEXO','PA_CALLE','PA_CALLE_NUMERO','PA_TELEF','PA_FECOBI'));//muchos a uno
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

      public function consulta_diagnostico()
    {
        return $this->HasMany('App\ConsultaDiagnostico', 'ID_TURNO_C','IDTurno_C');
        //return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
    }

    public function examen_fisico()
     {
         return $this->HasMany('App\ExamenFisico','IDTURNOC','IDTurno_C');//muchos a uno
     }

}
