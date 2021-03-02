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

class HospitalMunucipalController extends Controller
{

  public function pruebas_web_service(){

    $servicioturnos="http://192.168.3.200/webservice/pacientedoc.php?wsdl";
    $parametrosturnos=array();
    $parametrosturnos['tipo_doc'] = "DNI";
    $parametrosturnos['num_doc'] = "37235367";

    $client = new SoapClient($servicioturnos);
    $result = $client->consulta($parametrosturnos);
    $result = json_decode($result,true);
    return $result;


    $servicioturnos="http://192.168.3.200/webservice/consulta_ce_v2.php?wsdl";
    $parametrosturnos=array();
    $parametrosturnos['hiscli'] = "16120";
    $parametrosturnos['fecha'] = "2019-04-15";
    $parametrosturnos['hora'] = "08:30";
    $parametrosturnos['medico'] = "EQ0032";
    $parametrosturnos['espec'] = "18";
    $client = new SoapClient($servicioturnos);
    $result = $client->consultaCompleta($parametrosturnos);
    $result = json_decode($result,true);
    return $result;

  }
  public function crear_medicos_hospital(){

    $servicioturnos="http://192.168.3.201/webservice/medicos.php?wsdl";
    $client = new SoapClient($servicioturnos);
    $result = $client->consultas();
    $result = json_decode($result,true);
    return $result;

  }
  public function historia_clinica_consultorio_externo(){

    $id_paciente = $_GET['idpaciente'];

    $paciente = Paciente::Where('IDPaciente',$id_paciente)->first();

    if (($paciente['PA_HCHMBB'] == null) || ($paciente['PA_HCHMBB'] == 0)){

          $servicioturnos="http://192.168.3.200/webservice/pacientedoc.php?wsdl";
          $parametrosturnos=array();
          $parametrosturnos['tipo_doc'] = "DNI";
          $parametrosturnos['num_doc'] = $paciente['PA_NUMDOC'];

          $client = new SoapClient($servicioturnos);
          $result = $client->consulta($parametrosturnos);
          $result = json_decode($result,true);
          //return $result;



          $historia_clinica = $result['paciente']['hiscli'];

          $paciente['PA_HCHMBB'] = $result['paciente']['hiscli'];

          $paciente->save();
    }else{

        $historia_clinica = $paciente['PA_HCHMBB'];

    }



    ///return $result;


    $servicioturnos="http://192.168.3.200/webservice/historial_consultas.php?wsdl";
    $parametrosturnos=array();
    $parametrosturnos['hiscli'] = $historia_clinica;
    $parametrosturnos['asistio'] = "1";
    $parametrosturnos['anulado'] = "";
    $client = new SoapClient($servicioturnos);
    $result = $client->consultas($parametrosturnos);
    $result = json_decode($result,true);

    if (isset($result['consultas'])) {
     $result = $result['consultas'];
   }


       $historia_clinica_hospital_municipal  = json_encode($result,true);



       return view('paciente.historia_clinica.hospital_municipal',compact('historia_clinica_hospital_municipal'));

  }

  public function detalle_turno_hospital(){

    // $hiscli = '16120';
    // $fecha = '2019-04-15';
    // $hora = '08:30';
    // $medico = 'EQ0032';
    // $espec = '18';

    $hiscli = $_GET['hiscli'];
    $fecha = $_GET['fecha'];
    $hora = $_GET['hora'];
    $medico = $_GET['medico'];
    $espec = $_GET['espec'];


    $servicioturnos="http://192.168.3.200/webservice/consulta_ce_v2.php?wsdl";
    $parametrosturnos=array();
    $parametrosturnos['hiscli'] = $hiscli;
    $parametrosturnos['fecha'] = $fecha;
    $parametrosturnos['hora'] = $hora;
    $parametrosturnos['medico'] = $medico;
    $parametrosturnos['espec'] = $espec;
    $client = new SoapClient($servicioturnos);
    $result = $client->consultaCompleta($parametrosturnos);
    $result = json_decode($result,true);
    return $result;

  }
}
