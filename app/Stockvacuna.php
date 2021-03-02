<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stockvacuna extends Model
{
public $timestamps = false;
  protected $connection = 'sqlsrvSalud';

protected $table = 'TblVacunasStock';


  protected $fillable =[
    'IDCONSULTA'
   ,'VACUNA'
   ,'REMITO'
  ];

}
