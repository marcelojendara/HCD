<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblVacunaIndividuo extends Model
{
public $timestamps = false;
  protected $connection = 'sqlsrvSalud';

protected $table = 'tblVacunaIndividuo';


  protected $fillable =[
      'IdIndividuo'
      ,'IdVacunaDosis'
      ,'Fecha'
      ,'Observacion'
      ,'IdPaciente'
      ,'FechaAplicacion'
      ,'Dependencia'

  ];



}
