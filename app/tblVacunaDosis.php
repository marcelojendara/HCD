<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblVacunaDosis extends Model
{

  protected $connection = 'sqlsrvSalud';

protected $table = 'tblVacunaDosis';


  protected $fillable =[
      'IdVacuna'
      ,'IdEdad'
      ,'dosis'
      ,'boton'

  ];

}
