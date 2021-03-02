<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EcografiaPaciente extends Model
{

  protected $table = 'ecografia_pacientes';
  protected $fillable =[
      'planilla_id'
      ,'paciente_id'
      ,'informe'
      ,'profesional_mat'
      ,'dependencia_id'

  ];
}
