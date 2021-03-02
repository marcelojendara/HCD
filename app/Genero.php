<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{

  protected $connection = 'sqlsrvSalud';

protected $table = 'tblGenero';


  protected $fillable =[
    'ID'
    ,'NOMBRE'
  ];

}
