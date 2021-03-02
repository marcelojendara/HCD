<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamenFisico extends Model
{

  public $timestamps = false;
  protected $connection = 'sqlsrvSalud';

protected $table = 'TblExamenFisico';


  protected $fillable =[
    'IDTURNOC'
      ,'IDMEDIDA'
      ,'VALOR'
  ];
  public function turno_examen()
   {
       return $this->belongsTo('App\ConsultaTurno','IDTURNOC','IDTurno_C');//muchos a uno
   }

   public function examen_medida()
    {
        return $this->belongsTo('App\MedidaFisica','IDMEDIDA','ID');//muchos a uno
    }
}
