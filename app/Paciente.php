<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
public $timestamps = false;
 protected $primaryKey = 'IDPaciente';
  protected $connection = 'sqlsrvSalud';

protected $table = 'Paciente';
protected $hidden = [
    'RowVersion'
];

  protected $fillable =[
      'FechaOperacion'
      ,'Login'
      ,'RowVersion'
      ,'IDPaciente'
      ,'PA_CODPAR'
      ,'PA_APELLIDO'
      ,'PA_NOMBRE'
      ,'IDTipoDoc'
      ,'PA_NUMDOC'
      ,'PA_FECNAC'
      ,'PA_NACION'
      ,'PA_SEXO'
      ,'PA_CALLE'
      ,'PA_CALLE_NUMERO'
      ,'PA_CALLE_PISO'
      ,'PA_BARRIO'
      ,'PA_CODLOC'
      ,'PA_CODPRO'
      ,'PA_TELEF'
      ,'PA_OBSERV'
      ,'PA_CODOS'
      ,'PA_NROAFI'
      ,'PA_MAIL'
      ,'PA_FECOBI'
      ,'PA_HCHMBB'
      ,'PA_TD_MATERNO'
      ,'PA_ND_MATERNO'
      ,'PA_CUIL'
      ,'PA_NOMBRE_MATERNO'
      ,'PA_PESO_NAC'
      ,'PA_EDAD_GEST'
      ,'PA_ORIGEN'
      ,'PA_GENERO'

  ];

  public function nacionalidad()
   {
       return $this->belongsTo('App\Nacionalidad','PA_NACION','NA_COD');//muchos a uno
   }
   public function provincia()
    {
        return $this->belongsTo('App\Provincia','PA_CODPRO','PR_COD');//muchos a uno
    }
  public function localidad()
     {
         return $this->belongsTo('App\Localidad','PA_CODLOC','LO_COD');//muchos a uno
     }
  public function calle()
      {
          return $this->belongsTo('App\Calle','PA_CALLE','ID');//muchos a uno
      }

  public function barrio()
       {
           return $this->belongsTo('App\Barrio','PA_BARRIO','ID');//muchos a uno
       }

  public function tipo_documento()
    {
        return $this->belongsTo('App\TipoDocumento','IDTipoDoc','ID');//muchos a uno
    }
    public function tipo_documento_madre()
     {
         return $this->belongsTo('App\TipoDocumento','PA_TD_MATERNO','ID');//muchos a uno
     }
     public function obrasocial()
      {
          return $this->belongsTo('App\Obrasocial','PA_CODOS','OB_COD');//muchos a uno
      }
      public function genero()
       {
           return $this->belongsTo('App\Genero','PA_GENERO','ID');//muchos a uno
       }


}
