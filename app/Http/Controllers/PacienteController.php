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

use App\Obrasocial;

use App\Dependencia;

use App\TratamientoOdontograma;

use App\ExamenFisico;

use App\MedidaFisica;

use App\Genero;

use App\Stockvacuna;


use \Illuminate\Support\Facades\DB;

use SoapClient;


class PacienteController extends Controller
{

  function CallAPI()
  {

        //$detalle_vacuna = DB::connection('sqlsrvSalud')->select('EXEC usp_CNV_FndDosisAplicadas @idpaciente = '.$idpaciente.', @idcnv = '.$id_vacuna.'');
    $vacunas = DB::connection('sqlsrvSalud')->select("EXEC usp_VacunasDosisAplicadasParaStock_Rpt @FechaDesde = N'01/07/2020', @FechaHasta = N'01/07/2021'");
   //$vacunas json_encode($vacunas);

  //return $vacunas;
  $errores = 0;
  $correcto = 0;
    foreach ($vacunas as $vacuna) {

     $curl = curl_init();
     // set post fields
$data = [
   'codigoProducto' => $vacuna->CODIGOPRODUCTO,
   'salaOrigenCodigo' => $vacuna->SALAORIGENCODIGO,
   'nombreProfesional'   => $vacuna->NOMBREPROFESIONAL,
   'edad'   => $vacuna->EDAD,
   'idConsulta'   => $vacuna->IDCONSULTA,
];

//return $data;

     $url = 'http://stockdesalud.bb.mun.gba.gov.ar/api/actualizarStock';
             curl_setopt($curl, CURLOPT_POST, 1);

             if ($data)
                 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);


     // Optional Authentication:
     //curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
     //curl_setopt($curl, CURLOPT_USERPWD, "devtest:devt3st95$");

     curl_setopt($curl, CURLOPT_URL, $url);
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

     $result = curl_exec($curl);

     curl_close($curl);
     //return response()->json($result);
     $result = json_decode($result, true);
     //return $result;
     $status = $result['status'];
     if($status == 'error'){
       $errores = $errores+1;
     }else{
       $remito = $result['nroRemito'];
       if ($remito != null) {
         $descontarstock = NEW Stockvacuna;
         $descontarstock->IDCONSULTA = $vacuna->IDCONSULTA;
         $descontarstock->VACUNA = $vacuna->CODIGOPRODUCTO;
         $descontarstock->REMITO = $remito;
         echo $descontarstock;
         echo '</br>';
         $descontarstock->save();
         $correcto = $correcto+1;
       }else{

         echo $result;
       }

     }




    }

    echo $errores;
    echo 'br';
    echo $correcto;

  }

  public function pruebasql(){
    $obrasocial = Obrasocial::all();

    return $obrasocial;
  }
    public function buscarpaciente(){

        $tipos_documentos = TipoDocumento::All();

        return view('paciente.index',compact('tipos_documentos'));


    }

    public function buscar_paciente_dni(Request $request){

      $input = $request->all();



      $tipo_doc = $input['tipo_documento'];

      $num_doc = $input['num_documento'];

      $paciente = Paciente::where('PA_NUMDOC',$num_doc)
                          ->where('IDTipoDoc',$tipo_doc)
                          ->with('nacionalidad','tipo_documento','provincia','localidad','calle','barrio','obrasocial','tipo_documento_madre','genero')
                          ->first();
      //return $paciente;
      if (isset($paciente)) {
        $edad = $this->calcular_edad($paciente->PA_FECNAC);

        $fecha_nacimiento = new DateTime($paciente->PA_FECNAC);
        $fecha_nacimiento = $fecha_nacimiento->format('d-m-Y');

        if(isset($paciente->PA_FECOBI)) {
          $fecha_obito = new DateTime($paciente->PA_FECOBI);
          $fecha_obito = $fecha_obito->format('d-m-Y');
        }else{
          $fecha_obito = new DateTime;
        }

        //
        //return $paciente;
        return view('paciente.paciente_buscado',compact('paciente','edad','fecha_nacimiento','fecha_obito'));
      }else{


        $calles = Calle::All();
        $provincias = Provincia::All();
        $nacionalidades = Nacionalidad::All();
        $localidades = Localidad::All();
        $obrasocial = Obrasocial::All();
        $barrios = Barrio::All();
        $tipos_doc = TipoDocumento::All();
        $tipo_doc_seleccionado = TipoDocumento::findorfail($input['tipo_documento']);
        $generos = Genero::all();
        //return $tipo_doc_seleccionado;
        return view('paciente.nuevo_paciente',compact('calles','provincias','nacionalidades','localidades','obrasocial','barrios','tipos_doc','tipo_doc_seleccionado','generos'));
      }
  }

  public function buscar_paciente_dni2(Request $request){

    $input = $request->all();



    $tipo_doc = $input['tipo_documento'];

    $num_doc = $input['num_documento'];

    $paciente = Paciente::where('PA_NUMDOC',$num_doc)
                        ->where('IDTipoDoc',$tipo_doc)
                        ->with('nacionalidad','tipo_documento','provincia','localidad','calle','barrio','obrasocial','tipo_documento_madre','genero')
                        ->first();
    //return $paciente;
    if (isset($paciente)) {
      $edad = $this->calcular_edad($paciente->PA_FECNAC);

      $fecha_nacimiento = new DateTime($paciente->PA_FECNAC);
      $fecha_nacimiento = $fecha_nacimiento->format('d-m-Y');

      if(isset($paciente->PA_FECOBI)) {
        $fecha_obito = new DateTime($paciente->PA_FECOBI);
        $fecha_obito = $fecha_obito->format('d-m-Y');
      }else{
        $fecha_obito = new DateTime;
      }

      //
      //return $paciente;
      return view('paciente.paciente_buscado2',compact('paciente','edad','fecha_nacimiento','fecha_obito'));
    }else{


      $calles = Calle::All();
      $provincias = Provincia::All();
      $nacionalidades = Nacionalidad::All();
      $localidades = Localidad::All();
      $obrasocial = Obrasocial::All();
      $barrios = Barrio::All();
      $tipos_doc = TipoDocumento::All();
      $tipo_doc_seleccionado = TipoDocumento::findorfail($input['tipo_documento']);
      $generos = Genero::all();
      //return $tipo_doc_seleccionado;
      return view('paciente.nuevo_paciente',compact('calles','provincias','nacionalidades','localidades','obrasocial','barrios','tipos_doc','tipo_doc_seleccionado','generos'));
    }
}

  public static function convert_from_latin1_to_utf8_recursively($dat)
  {
     if (is_string($dat)) {
        return utf8_encode($dat);
     } elseif (is_array($dat)) {
        $ret = [];
        foreach ($dat as $i => $d) $ret[ $i ] = self::convert_from_latin1_to_utf8_recursively($d);

        return $ret;
     } elseif (is_object($dat)) {
        foreach ($dat as $i => $d) $dat->$i = self::convert_from_latin1_to_utf8_recursively($d);

        return $dat;
     } else {
        return $dat;
     }
  }

    public function historia_clinica_unidades_sanitarias(){

      $idpaciente =  $_GET['idpaciente'];

      $historia_clinica = ConsultaTurno::select('FechaOperacion'
                                          ,'Login'
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
                                          ,'ORIGEN')
                                        ->where('IDPaciente',$idpaciente)
                                        ->with('medico_turno.especialidad','consulta_especialidad','consulta_obrasocial','consulta_dependencia','consulta_diagnostico.diagnostico')
                                        ->orderBy('TU_FECHA','Desc')
                                        ->get();

    // return response()->json($historia_clinica);
      //$historia_clinica = PacienteController::convert_from_latin1_to_utf8_recursively($historia_clinica);
    //  return $historia_clinica;
      $historia_clinica = json_encode($historia_clinica);


      return view('paciente.historia_clinica.unidades_sanitarias',compact('historia_clinica'));
    }

    public function historia_clinica_completa(){



      $idpaciente =  $_GET['idpaciente'];

      $historia_clinica_completa_unidades = ConsultaTurno::where('IDPaciente',$idpaciente)
                                        ->with('medico_turno.especialidad','consulta_especialidad','consulta_obrasocial','consulta_dependencia','consulta_diagnostico.diagnostico')
                                        ->orderBy('FechaOperacion','Desc')
                                        ->get();
      //return $historia_clinica_completa_unidades;


//----- fin coleccion unidades sanitarias----------//

//--------comienzo coleccion hospital municipal------//

$paciente = Paciente::Where('IDPaciente',$idpaciente)->first();

if ($paciente['PA_HCHMBB'] == null) {

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


      $servicioturnos="http://192.168.3.200/webservice/historial_ce.php?wsdl"; //url del servicio turnos

        $parametrosturnos=array();
      //  $parametrosturnos['hiscli'] = "286884";
        $parametrosturnos['hiscli'] = $historia_clinica;

       $client = new SoapClient($servicioturnos);
       $result = $client->historial_turnos_consultas($parametrosturnos);


       $result = json_decode($result,true);
       //return $result;
       $renglonescollect = collect([]);
       foreach ($result['turnosCE'] as $turno) {

         if ($turno['turno']['Asistio'] == 'S'){
           //return 'asisitio';

           $tu_numero = $turno['turno']['NroTurno'];
           $tu_fecha =  $turno['turno']['Fecha'];
           $medico = collect([
             'legajo' => $turno['turno']['LegMedico'],
             'nombre' =>  $turno['turno']['Medico']
           ]);
           $especialidad = collect([
             'codigo' =>  $turno['turno']['CodEspec'],
             'nombre' =>  $turno['turno']['DescripEspe']
           ]);
           $obrasocial = collect([
             'nro_afiliado' =>  $turno['turno']['NroAfi'],
             'nombre' => $turno['turno']['ObraSoc']
           ]);
           $diagnostico = $turno['turno']['Diagno'];
           $consulta = $turno['consulta'];
           $problemas = $turno['problemas'];
           $tratamientos = $turno['tratamientos'];
           $practicasRX = $turno['practicasRX'];

            $info_turno = collect([


              'fecha' => $tu_fecha,
              'medico' => $medico,
              'consulta_especialidad' => $especialidad,
              'obrasocial' => $obrasocial,
              'diagnostico' => $diagnostico,
              'consulta' => $consulta,
              'problemas' => $problemas,
              'tratamientos' => $tratamientos,
              'practicasRX' => $practicasRX

            ]);
            $renglonescollect->push($info_turno);
         }

       }

       $historia_clinica_completa_hostpital = $renglonescollect;
//-------------fin coleccion hostpital municipal-------------//









    //return $historia_clinica_completa;




      return view('paciente.historia_clinica.completa',compact('historia_clinica_completa_unidades','historia_clinica_completa_hostpital'));
    }


     function calcular_edad($fecha){
      $cumpleanos = new DateTime($fecha);
      $hoy = new DateTime();
      $annos = $hoy->diff($cumpleanos);
      return $annos->y;
    }

    public function vacunacion_paciente(){

      $idpaciente =  $_GET['idpaciente'];

      //27179

        $vacunas = DB::connection('sqlsrvSalud')->select('EXEC usp_CNV_FndPaciente @idpaciente = '.$idpaciente.'');

        $vacunas = json_encode($vacunas,true);
        //return $vacunas;
        return view('paciente.historia_clinica.vacunas',compact('vacunas'));
        return $vacunas;

    }



    public function detalle_vacunas(){
      $idpaciente =  $_GET['idpaciente'];
      $id_vacuna = $_GET['id_vacuna'];

      //27179

      $detalle_vacuna = DB::connection('sqlsrvSalud')->select('EXEC usp_CNV_FndDosisAplicadas @idpaciente = '.$idpaciente.', @idcnv = '.$id_vacuna.'');

        //$detalle_vacuna = json_encode($detalle_vacuna,true);
        return $detalle_vacuna;
      //  return view('paciente.historia_clinica.vacunas',compact('detalle_vacuna'));
      //  return $vacunas;
    }

    public function medicacion_paciente(){

      $idpaciente =  $_GET['idpaciente'];

      $paciente = Paciente::where('IDPaciente',$idpaciente)->first();
      $dni_paciente = $paciente->PA_NUMDOC;
      //27179

        $medicacion = DB::connection('sqlsrvSalud')->select('EXEC usp_Paciente_FndMedicacion @DOCUMENTO = '.$dni_paciente.'');

        $medicacion = json_encode($medicacion,true);
        //return $medicacion;
        return view('paciente.historia_clinica.medicamentos',compact('medicacion'));


    }
    public function form_nueva_consulta(){

      $user = Auth::user();

      $idpaciente =  $_GET['idpaciente'];

      //return $idpaciente;

      $medidas_fisicas = MedidaFisica::all();


      //return $medidas_fisicas;

      $medico = Medico::where('ME_MAT',$user->matricula)->with('especialidad')->first();
      //return $medico;
      $diagnosticos = Diagnostico::where('SELECCIONABLE',true)->get();
      $medico_dependencia = Dependencia::where('ID',$user->oficina)->first();
      //return $medico_dependencia;
      $dependencias = Dependencia::All();
      //return $dependencias;
      return view('formularios.nuevaconsulta',compact('user','medico','diagnosticos','idpaciente','medidas_fisicas','medico_dependencia','dependencias'));
    }

    public function nueva_consulta_create(Request $request){

      $input = $request->All();

      //return $input;

      $user = Auth::user();

      $consulta = new ConsultaTurno;
      $consulta->FechaOperacion = date('Y-d-m H:i:s');
      $consulta->IDPaciente = $input['id_paciente'];  //falta pasar id paciente
      $consulta->Login = $user->legajo;
      $consulta->TU_FECHA = date('Y-d-m H:i:s');
      $consulta->TU_HORA = date('H:i');
      $consulta->TU_MEDICO = $user->matricula;
      $consulta->TU_ESPEC = $input['especialidad_medico'];
      $consulta->TU_CODOS = '0000';
      $consulta->TU_DIAG = '0';
      $consulta->TU_PRIMVEZ = 's';
      $consulta->IDACCIDENTE = '0';
      $consulta->TU_SNarrativa = str_replace("&quot;", "'", $input['editor1']);
      $consulta->TU_ONarrativa = str_replace("&quot;", "'", $input['editor2']);
      $consulta->TU_ENarrativa = str_replace("&quot;", "'",$input['editor3']);
      $consulta->TU_PNarrativa = str_replace("&quot;", "'",$input['editor4']);
      $consulta->IDDependencia = $input['dependencia'];
      $consulta->ORIGEN = 1;
      $consulta->save();


      $user->oficina = $input['dependencia'];

      $user->save();
      //return $consulta;


      if (($input['peso'] != '')) {
        $examenfisico = new ExamenFisico;
        $examenfisico->IDTURNOC = $consulta->IDTurno_C;
        $examenfisico->IDMEDIDA = 1;
        $examenfisico->VALOR = $input['peso'];
        $examenfisico->save();
      }
      if (($input['talla'] != '')) {
        $examenfisico = new ExamenFisico;
        $examenfisico->IDTURNOC = $consulta->IDTurno_C;
        $examenfisico->IDMEDIDA = 2;
        $examenfisico->VALOR = $input['talla'];
        $examenfisico->save();
      }
      if (($input['imc'] != '')) {
        $examenfisico = new ExamenFisico;
        $examenfisico->IDTURNOC = $consulta->IDTurno_C;
        $examenfisico->IDMEDIDA = 11;
        $examenfisico->VALOR = $input['imc'];
        $examenfisico->save();
      }
      if (($input['pesoprecentil'] != '')) {
        $examenfisico = new ExamenFisico;
        $examenfisico->IDTURNOC = $consulta->IDTurno_C;
        $examenfisico->IDMEDIDA = 12;
        $examenfisico->VALOR = $input['pesoprecentil'];
        $examenfisico->save();
      }
      if (($input['tallaprecentil'] != '')) {
        $examenfisico = new ExamenFisico;
        $examenfisico->IDTURNOC = $consulta->IDTurno_C;
        $examenfisico->IDMEDIDA = 13;
        $examenfisico->VALOR = $input['tallaprecentil'];
        $examenfisico->save();
      }
      if (($input['pcprecentil'] != '')) {
        $examenfisico = new ExamenFisico;
        $examenfisico->IDTURNOC = $consulta->IDTurno_C;
        $examenfisico->IDMEDIDA = 14;
        $examenfisico->VALOR = $input['pcprecentil'];
        $examenfisico->save();
      }

      if (($input['perimetro_cefalico'] != '')) {
        $examenfisico = new ExamenFisico;
        $examenfisico->IDTURNOC = $consulta->IDTurno_C;
        $examenfisico->IDMEDIDA = 3;
        $examenfisico->VALOR = $input['perimetro_cefalico'];
        $examenfisico->save();
      }
      if (($input['perimetro_abdominal'] != '')) {
        $examenfisico = new ExamenFisico;
        $examenfisico->IDTURNOC = $consulta->IDTurno_C;
        $examenfisico->IDMEDIDA = 4;
        $examenfisico->VALOR = $input['perimetro_abdominal'];
        $examenfisico->save();
      }
      if (($input['tas'] != '')) {
        $examenfisico = new ExamenFisico;
        $examenfisico->IDTURNOC = $consulta->IDTurno_C;
        $examenfisico->IDMEDIDA = 5;
        $examenfisico->VALOR = $input['tas'];
        $examenfisico->save();
      }
      if (($input['tad'] != '')) {
        $examenfisico = new ExamenFisico;
        $examenfisico->IDTURNOC = $consulta->IDTurno_C;
        $examenfisico->IDMEDIDA = 6;
        $examenfisico->VALOR = $input['tad'];
        $examenfisico->save();
      }
      if (($input['fecha_probable_parto'] != '')) {
        $examenfisico = new ExamenFisico;
        $examenfisico->IDTURNOC = $consulta->IDTurno_C;
        $examenfisico->IDMEDIDA = 7;
        $fecha_probable_parto = $input['fecha_probable_parto'];
        $examenfisico->VALOR = $fecha_probable_parto;
        $examenfisico->save();
      }
      if (($input['fecha_ultima_mestruacion'] != '')) {
        $examenfisico = new ExamenFisico;
        $examenfisico->IDTURNOC = $consulta->IDTurno_C;
        $examenfisico->IDMEDIDA = 8;
        $fecha_ultima_mestruacion = $input['fecha_ultima_mestruacion'];
        $examenfisico->VALOR = $fecha_ultima_mestruacion;
        $examenfisico->save();
      }
      if (($input['fecha_de_parto'] != '')) {
        $examenfisico = new ExamenFisico;
        $examenfisico->IDTURNOC = $consulta->IDTurno_C;
        $examenfisico->IDMEDIDA = 21;
        $fecha_de_parto = $input['fecha_de_parto'];
        $examenfisico->VALOR = $fecha_de_parto;
        $examenfisico->save();
      }
      if (($input['frecuencia_cardiaca'] != '')) {
        $examenfisico = new ExamenFisico;
        $examenfisico->IDTURNOC = $consulta->IDTurno_C;
        $examenfisico->IDMEDIDA = 9;
        $examenfisico->VALOR = $input['frecuencia_cardiaca'];
        $examenfisico->save();
      }
      if (($input['temperatura'] != '')) {
        $examenfisico = new ExamenFisico;
        $examenfisico->IDTURNOC = $consulta->IDTurno_C;
        $examenfisico->IDMEDIDA = 10;
        $examenfisico->VALOR = $input['temperatura'];
        $examenfisico->save();
      }
      if (($input['caries'] != '')) {
        $examenfisico = new ExamenFisico;
        $examenfisico->IDTURNOC = $consulta->IDTurno_C;
        $examenfisico->IDMEDIDA = 15;
        $examenfisico->VALOR = $input['caries'];
        $examenfisico->save();
      }
      if (($input['perdidos'] != '')) {
        $examenfisico = new ExamenFisico;
        $examenfisico->IDTURNOC = $consulta->IDTurno_C;
        $examenfisico->IDMEDIDA = 16;
        $examenfisico->VALOR = $input['perdidos'];
        $examenfisico->save();
      }
      if (($input['obturados'] != '')) {
        $examenfisico = new ExamenFisico;
        $examenfisico->IDTURNOC = $consulta->IDTurno_C;
        $examenfisico->IDMEDIDA = 17;
        $examenfisico->VALOR = $input['obturados'];
        $examenfisico->save();
      }
      if (($input['factor_riesgo_cardiovascular'] != '')) {
        $examenfisico = new ExamenFisico;
        $examenfisico->IDTURNOC = $consulta->IDTurno_C;
        $examenfisico->IDMEDIDA = 18;
        $examenfisico->VALOR = $input['factor_riesgo_cardiovascular'];
        $examenfisico->save();
      }
      if (($input['frecuencia_respiratoria'] != '')) {
        $examenfisico = new ExamenFisico;
        $examenfisico->IDTURNOC = $consulta->IDTurno_C;
        $examenfisico->IDMEDIDA = 19;
        $examenfisico->VALOR = $input['frecuencia_respiratoria'];
        $examenfisico->save();
      }
      if (($input['saturacion_oxigeno'] != '')) {
        $examenfisico = new ExamenFisico;
        $examenfisico->IDTURNOC = $consulta->IDTurno_C;
        $examenfisico->IDMEDIDA = 20;
        $examenfisico->VALOR = $input['saturacion_oxigeno'];
        $examenfisico->save();
      }
      if (($input['edad_gestacional'] != '')) {
        $examenfisico = new ExamenFisico;
        $examenfisico->IDTURNOC = $consulta->IDTurno_C;
        $examenfisico->IDMEDIDA = 22;
        $examenfisico->VALOR = $input['edad_gestacional'];
        $examenfisico->save();
      }



      //return $input['diagnostico'];

      foreach($input['diagnostico'] as $diag){

        $consulta_diagnostico = New ConsultaDiagnostico;

        $consulta_diagnostico->ID_TURNO_C = $consulta->IDTurno_C;
        $consulta_diagnostico->TU_DIAG = $diag;

        $consulta_diagnostico->save();
      }

      $paciente = Paciente::where('IDPaciente',$input['id_paciente'])->first();

      //return $paciente;
      //return back()->withInput(['tipo_documento' => $paciente->IDTipoDoc,'num_documento' =>$paciente->PA_NUMDOC ]);

      return redirect()->route('buscar_paciente_dni', ['tipo_documento'=>$paciente->IDTipoDoc,'num_documento'=>$paciente->PA_NUMDOC ]);


    }

    public function modificar_datos_paciente(){

      $idpaciente =  $_GET['idpaciente'];

      $paciente = Paciente::where('IDPaciente',$idpaciente)
                          ->with('nacionalidad','tipo_documento','provincia','localidad','calle','barrio','tipo_documento_madre','obrasocial','genero')
                          ->first();



      $fecha_nacimiento  = new DateTime($paciente->PA_FECNAC);
      $paciente->PA_FECNAC = $fecha_nacimiento->format('d-m-Y');

      if(isset($paciente->PA_FECOBI)) {
        $fecha_obito = new DateTime($paciente->PA_FECOBI);
        $paciente->PA_FECOBI = $fecha_obito->format('d-m-Y');
      }


    //return $paciente;
      $tipos_documentos = TipoDocumento::all();
      $nacionalidades = Nacionalidad::all();
      $provincias = Provincia::all();
      $localidades = Localidad::all();
      $calles = Calle::all();
      $barrios = Barrio::all();
      $obrasocial = Obrasocial::all();
      $generos = Genero::all();


      return view('paciente.abm.modificar_datos',compact('paciente','tipos_documentos','provincias','localidades','calles','barrios','obrasocial','nacionalidades','generos'));

    }

    public function  ultimo_examen_fisico(){

      $idpaciente = $_GET['idpaciente'];

      $historia_clinica_unidades = ConsultaTurno::select('IDTurno_C','TU_FECHA')->with('examen_fisico.examen_medida')->where('IDPaciente',$idpaciente)->orderBy('IDTurno_C','desc')->get();

      $examenes = Collect([]);
      foreach ($historia_clinica_unidades as $historia) {

        if (isset($historia['examen_fisico'][0])) {

          $examenes->push($historia);
          // code...
        }
      }

      $ultimo_examen = $examenes->first();
      return view('paciente.historia_clinica.examenfisico',compact('examenes','ultimo_examen'));

      //$ultimo_examen_fisico = ExamenFisico::where('IDTURNOC',)

    }


    public function paciente_datos_create(Request $request){

      $input = $request->all();

      //return $input;

      $user = Auth::user();

      $paciente = New Paciente;

      $paciente->Login = $user->legajo;

      $paciente->PA_APELLIDO = $input['apellido'];

      $paciente->PA_NOMBRE = $input['nombre'];

      $paciente->IDTipoDoc = $input['tipo_doc'];

      $paciente->PA_NUMDOC = $input['nro_doc_nuevo'];

      $paciente->PA_SEXO = $input['sexo'];

      $paciente->PA_GENERO = $input['genero'];

      $paciente->PA_FECNAC = $input['fecha'];

      if ($input['fechaobito'] != '') {
                  $paciente->PA_FECOBI = $input['fechaobito'];
      }

      $paciente->PA_NACION = $input['nacionalidad'];

      $paciente->PA_CODPRO = $input['provincia'];

      $paciente->PA_CODLOC = $input['localidad'];

      $paciente->PA_BARRIO = $input['barrio'];

      $paciente->PA_CALLE = $input['calle'];

      $paciente->PA_CALLE_NUMERO = $input['paciente_calle_numero'];

      $paciente->PA_CALLE_PISO = $input['paciente_calle_piso'];

      $paciente->PA_TELEF = $input['paciente_telefono'];

      $paciente->PA_MAIL = $input['paciente_mail'];

      $paciente->PA_CUIL = $input['cuitcuil'];

      $paciente->PA_CODOS = $input['obrasocial'];

      $paciente->PA_NROAFI = $input['paciente_num_afiliado'];

      $paciente->PA_PESO_NAC = $input['paciente_peso_nacimiento'];

      $paciente->PA_EDAD_GEST = $input['paciente_edad_gestacional'];

      $paciente->PA_TD_MATERNO = $input['tipo_documento_madre'];

      $paciente->PA_ND_MATERNO = $input['PA_ND_MATERNO'];

      $paciente->PA_NOMBRE_MATERNO = $input['PA_NOMBRE_MATERNO'];

      $paciente->PA_OBSERV = $input['observaciones'];



      $paciente->save();

        return redirect()->route('buscar_paciente_dni', ['tipo_documento'=>$paciente->IDTipoDoc,'num_documento'=>$paciente->PA_NUMDOC ]);

    }


    public function paciente_datos_update(Request $request){

      $input = $request->all();

      //return $input;

      $paciente = Paciente::where('IDPaciente',$input['id_paciente'])->first();
      //return $paciente;
      $paciente->PA_SEXO =  $input['sexo'];

      $paciente->PA_GENERO =  $input['genero'];

      $paciente->PA_FECNAC = $input['fecha'];

      if ($input['fechaobito'] != '') {
                  $paciente->PA_FECOBI = $input['fechaobito'];
      }

      $paciente->PA_CALLE = $input['direccion'];

      $paciente->PA_CALLE_NUMERO = $input['paciente_calle_numero'];

      $paciente->PA_CALLE_PISO = $input['paciente_calle_piso'];

      $paciente->PA_BARRIO = $input['paciente_barrio_id'];

      $paciente->PA_NACION = $input['nacionalidad'];

      $paciente->PA_CODLOC = $input['localidad'];

      $paciente->PA_CODPRO = $input['provincia'];

      $paciente->PA_TELEF = $input['paciente_telefono'];

      $paciente->PA_MAIL = $input['paciente_mail'];

      $paciente->PA_CUIL = $input['cuitcuil'];

      $paciente->PA_CODOS = $input['obrasocial'];

      $paciente->PA_NROAFI = $input['paciente_num_afiliado'];

      if (isset($input['paciente_peso_nacimiento'])) {
        if ($input['paciente_peso_nacimiento'] != '') {
          $paciente->PA_PESO_NAC = $input['paciente_peso_nacimiento'];
        }
      }
      if (isset($input['paciente_edad_gestacional'])) {
        if ($input['paciente_edad_gestacional'] != '') {
          $paciente->PA_EDAD_GEST = $input['paciente_edad_gestacional'];
        }
      }

      $paciente->PA_TD_MATERNO = $input['tipo_doc_madre'];

      $paciente->PA_ND_MATERNO = $input['PA_ND_MATERNO'];

      $paciente->PA_NOMBRE_MATERNO = $input['PA_NOMBRE_MATERNO'];

      $paciente->PA_OBSERV = $input['observaciones'];

      $paciente->save();

        return redirect()->route('buscar_paciente_dni', ['tipo_documento'=>$paciente->IDTipoDoc,'num_documento'=>$paciente->PA_NUMDOC ]);

    }

    public function historia_clinica_paciente_hospital(){



      $servicioturnos="http://192.168.3.201/webservice/reserva_turnos_v3.php?wsdl"; //url del servicio turnos

         $parametrosturnos=array();
         $parametrosturnos['hiscli'] = "101";
         $parametrosturnos['especial'] = "25";
         $parametrosturnos['fecha_desde'] = "2019-02-11";
         $parametrosturnos['fecha_hasta'] = "2019-02-28";

         $client = new SoapClient($servicioturnos);
        $result = $client->consultarTurnos($parametrosturnos);

        $result = json_decode($result,true);

        return $result;
    }

    public function nuevo_odontograma(){

      $idpaciente_odontograma =  $_GET['idpaciente'];

      return view('formularios.nuevoodontograma',compact('idpaciente_odontograma'));
    }


    public function guardar_odontograma(Request $request){
      $user = Auth::user();

      $medico = Medico::where('ME_MAT',$user->matricula)->with('especialidad')->first();

      $input = $request->all();
      $hoy = new DateTime();

      $paciente = Paciente::where('IDPaciente',$input['paciente_id'])->first();

      $odontograma = new Odontograma;

      $odontograma->fecha_operacion = $hoy;

      $odontograma->paciente_id = $input['paciente_id'];

      $odontograma->TU_MEDICO = $medico->ME_MAT;

      $odontograma->TU_ESPEC = $medico->especialidad->IDESPECIALIDAD;

      $odontograma->IDDependencia = $user->area;

      $odontograma->TU_CODOS = $paciente->PA_CODOS;

      $odontograma->save();

      foreach ($input['renglones'] as $r) {

           $renglon = new TratamientoOdontograma();

           $renglon->odontograma_id = $odontograma->id;
           $renglon->lado = $r['input_tratamiento_lado'];
           $renglon->numero = $r['input_tratamiento_numero'];
           $renglon->control = $r['input_tratamiento'];

           $renglon->save();
       }


       $paciente = Paciente::where('IDPaciente',$input['paciente_id'])->first();

       return redirect()->route('buscar_paciente_dni', ['tipo_documento'=>$paciente->IDTipoDoc,'num_documento'=>$paciente->PA_NUMDOC ]);

    }

    public function buscar_examen_fisico(){

      $idpaciente =  $_GET['idpaciente'];
      $examen_fisico = ExamenFisico::where('id_paciente',$idpaciente)->get();

      return $examen_fisico;
      return view('paciente.historia_clinica.examenfisico', compact('examenfisico'));
    }

    public function hse_del_dia(){

      $medico = Auth::user();

        $hse =  ConsultaTurno::select('FechaOperacion'
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
                                      ,'ORIGEN')
                                    ->where('TU_MEDICO',$medico->matricula)
                                    ->whereDate('FechaOperacion', '>=', date('Y-m-d'))
                                    ->with('medico_turno.especialidad','paciente_turno','consulta_especialidad','consulta_obrasocial','consulta_dependencia','consulta_diagnostico.diagnostico','examen_fisico')
                                    ->orderBy('FechaOperacion','Desc')
                                    ->get();
        //return $hse;
        $hse = json_encode($hse,true);
      return view('profesionales.historias_del_dia', compact('hse'));
    }

    public function formulario_editar_hse(){


      $user = Auth::user();

      $medico = Medico::where('ME_MAT',$user->matricula)->with('especialidad')->first();

      $idturno =  $_GET['id_turno'];

      $hse =  ConsultaTurno::select('FechaOperacion'
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
                                    ,'ORIGEN')
                                  ->where('TU_MEDICO',$user->matricula)
                                  ->where('IDTurno_C',$idturno)
                                  ->whereDate('FechaOperacion', '>=', date('Y-m-d'))
                                  ->with('medico_turno.especialidad','paciente_turno','consulta_especialidad','consulta_obrasocial','consulta_dependencia','consulta_diagnostico.diagnostico','examen_fisico')
                                  ->orderBy('FechaOperacion','Desc')
                                  ->first();
      //return $hse;
      $diag_consutla = [];

      foreach($hse->consulta_diagnostico as $diag){

        array_push($diag_consutla,$diag->TU_DIAG);
      }




      //return $diag_consutla;

      $medidas_fisicas = MedidaFisica::all();

      $idpaciente = $hse->IDPaciente;
      //return $medico;
      $diagnosticos = Diagnostico::where('SELECCIONABLE',true)->get();
      $medico_dependencia = Dependencia::where('ID',$user->oficina)->first();
      //return $medico_dependencia;
      $dependencias = Dependencia::All();
      //return $dependencias;
      return view('formularios.editar_consulta',compact('diag_consutla','hse','user','medico','diagnosticos','idpaciente','medidas_fisicas','medico_dependencia','dependencias'));

    }

    public function editar_consulta(Request $request){

      $input = $request->All();



      $user = Auth::user();

      $consulta = ConsultaTurno::where('IDTurno_C',$input['IDTurno_c'])->where('TU_MEDICO',$user->matricula)->whereDate('FechaOperacion', '>=', date('Y-m-d'))->first();
      //return $consulta;
      $consulta->FechaOperacion = date('Y-d-m H:i:s');
      $consulta->IDPaciente = $input['id_paciente'];  //falta pasar id paciente
      $consulta->Login = $user->legajo;
      $consulta->TU_FECHA = date('Y-d-m H:i:s');
      $consulta->TU_HORA = date('H:i');
      $consulta->TU_MEDICO = $user->matricula;
      $consulta->TU_ESPEC = $input['especialidad_medico'];
      $consulta->TU_CODOS = '0000';
      $consulta->TU_DIAG = '0';
      $consulta->TU_PRIMVEZ = 's';
      $consulta->IDACCIDENTE = '0';
      $consulta->TU_SNarrativa = str_replace("&quot;", "'", $input['editor1']);
      $consulta->TU_ONarrativa = str_replace("&quot;", "'", $input['editor2']);
      $consulta->TU_ENarrativa = str_replace("&quot;", "'",$input['editor3']);
      $consulta->TU_PNarrativa = str_replace("&quot;", "'",$input['editor4']);
      $consulta->IDDependencia = $input['dependencia'];
      $consulta->ORIGEN = 1;
      $consulta->save();


      $user->oficina = $input['dependencia'];

      $user->save();



      //return $consulta;

      $consulta_diagnostico = ConsultaDiagnostico::where('ID_TURNO_C',$consulta->IDTurno_C)->delete();



      foreach($input['diagnostico'] as $diag){
        $consulta_diagnostico = New ConsultaDiagnostico;

        $consulta_diagnostico->ID_TURNO_C = $consulta->IDTurno_C;
        $consulta_diagnostico->TU_DIAG = $diag;

        $consulta_diagnostico->save();
      }

      $paciente = Paciente::where('IDPaciente',$input['id_paciente'])->first();

      //return $paciente;
      //return back()->withInput(['tipo_documento' => $paciente->IDTipoDoc,'num_documento' =>$paciente->PA_NUMDOC ]);

      return redirect()->route('buscar_paciente_dni', ['tipo_documento'=>$paciente->IDTipoDoc,'num_documento'=>$paciente->PA_NUMDOC ]);


    }


    public function formulario_eliminar_hse(Request $request){

      $input = $request->All();
      $user = Auth::user();

      $medico = Medico::where('ME_MAT',$user->matricula)->with('especialidad')->first();

      $idturno =  $input['id_turno'];

      $hse =  ConsultaTurno::select('FechaOperacion'
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
                                    ,'ORIGEN')
                                  ->where('TU_MEDICO',$user->matricula)
                                  ->where('IDTurno_C',$idturno)
                                  ->whereDate('FechaOperacion', '>=', date('Y-m-d'))
                                  ->orderBy('FechaOperacion','Desc')
                                  ->first();





      //return $dependencias;
      return view('formularios.eliminar_consulta',compact('hse'));

    }

    public function eliminar_consulta(Request $request){

      $input = $request->all();
      $user = Auth::user();

      $hse = ConsultaTurno::where('IDTurno_C',$input['idturno_c'])->where('TU_MEDICO',$user->matricula)->whereDate('FechaOperacion', '>=', date('Y-m-d'))->delete();
      $consulta_diagnostico = ConsultaDiagnostico::where('ID_TURNO_C',$input['idturno_c'])->delete();
      return redirect()->back();
    }



}
