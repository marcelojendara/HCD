<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use DateTime;

use App\User;

use App\TipoDocumento;

use App\Paciente;

use App\Medico;

use App\Provincia;

use App\Localidad;

use App\Calle;

use App\Barrio;

use App\Diagnostico;

use App\ConsultaDiagnostico;

use App\Nacionalidad;

use App\ConsultaTurno;

use App\Odontograma;

use App\TratamientoOdontograma;

use SoapClient;


class OdontologiaController extends Controller
{
    public function historia_clinica_odontologia(){

      $idpaciente =  $_GET['idpaciente'];

      $historia_clinica_odontologia = Odontograma::where('paciente_id',$idpaciente)
                                        ->with('medico_turno.especialidad','consulta_especialidad','consulta_obrasocial','consulta_dependencia','tratamiento_odontograma')
                                        ->orderBy('fecha_operacion','Desc')
                                        ->get();

      //return $historia_clinica_odontologia;
      $historia_clinica_odontologia = json_encode($historia_clinica_odontologia);

      return view('paciente.historia_clinica.odontologia',compact('historia_clinica_odontologia'));


    }
}
