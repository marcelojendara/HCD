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

class InfoController extends Controller
{

  public function pacientes_riesgo(){
    $diagnosticos = Diagnostico::where('SELECCIONABLE',true)->get();

    return view('datos.pacientes_riesgo',compact('diagnosticos'));
  }

  public function pacientes_riesgo2(){
    $diagnosticos = Diagnostico::where('SELECCIONABLE',true)->get();

    return view('datos.pacientes_riesgo2',compact('diagnosticos'));
  }
    public function info_pacientes(){

      //$pacientes = Paciente::all();
      $diag = implode("",$_GET['diagnostico']);;
      $desde = $_GET['fechadesde'];
      $desde = date("Y-m-d", strtotime($desde));
      $hasta = $_GET['fechahasta'];
      $hasta = date("Y-m-d", strtotime($hasta));
      $diags = '';
       $diag = $_GET['diagnostico'];
       foreach ($diag as $value) {
           $diags = $diags."'".$value."',";
       }
       //return $diags;

  $diags = substr ($diags, 0, strlen($diags) - 1);
  $vacunas = DB::connection('sqlsrvSalud')->select("SELECT TD.TU_DIAG,pa.IDPaciente,d.Diagnostico ,dep.NOMBRE,ca.Calle_Nombre, pa.IDPaciente ,pa.PA_NOMBRE,pa.PA_APELLIDO,pa.PA_FECNAC,pa.PA_SEXO,pa.PA_CALLE,pa.PA_CALLE_NUMERO,pa.PA_TELEF,pa.PA_FECOBI
                                                    FROM PACIENTE pa INNER JOIN Turnos_C T  ON pa.IDPACIENTE=T.IDPACIENTE
                                                                    INNER JOIN TURNOS_C_DIAG TD ON TD.ID_TURNO_C=T.IDTurno_C
                                  INNER JOIN tblDependencias dep ON dep.ID=T.IDDependencia
                                                            INNER JOIN diagnostico as d ON d.DI_CODIGO = TD.TU_DIAG
                                                            LEFT JOIN vCalles as ca on ca.ID = pa.PA_CALLE
                                                    WHERE TD.TU_DIAG IN (".$diags.") and pa.PA_FECOBI  IS NULL and t.TU_FECHA between '".$desde."' and '".$hasta."'
                                                    GROUP BY TD.TU_DIAG,pa.IDPaciente,dep.NOMBRE,d.Diagnostico  ,ca.Calle_Nombre,pa.IDPaciente,pa.PA_NOMBRE,pa.PA_APELLIDO,pa.PA_FECNAC,pa.PA_SEXO,pa.PA_CALLE,pa.PA_CALLE_NUMERO,pa.PA_TELEF,pa.PA_FECOBI
                                                    ORDER BY ca.Calle_Nombre desc");
  $vacunas = json_decode(json_encode($vacunas), true);


                                                    $result = array();
                                                    foreach ($vacunas as $element) {
                                                        $result[$element['IDPaciente']][] = $element;
                                                    }

  $collect = collect([]);
  foreach ($result as $value) {

  $collect_diagnosticos = collect([]);
  $collect_dependencias = collect([]);
  foreach ($value as $diag) {

    if($collect_dependencias->contains('NOMBRE',$diag['NOMBRE'])) {

  }else{
    $collect_dependencias->push([
        'NOMBRE' => $diag['NOMBRE'],

    ]);
  }

  if($collect_diagnosticos->contains('id',$diag['TU_DIAG'])){

  }else{
    $collect_diagnosticos->push([
        'id' => $diag['TU_DIAG'],
        'Diagnostico' => $diag['Diagnostico'],
    ]);
  }


  }
  $collect->push([
            'paciente' => $value[0]['IDPaciente'],
            'nombre' => $value[0]['PA_NOMBRE'],
            'apellido' => $value[0]['PA_APELLIDO'],
            'PA_FECNAC' => $value[0]['PA_FECNAC'],
            'PA_SEXO' => $value[0]['PA_SEXO'],
            'PA_CALLE' => $value[0]['PA_CALLE'],
            'PA_CALLE_NUMERO' => $value[0]['PA_CALLE_NUMERO'],
            'Calle_Nombre' => $value[0]['Calle_Nombre'],
            'PA_TELEF' => $value[0]['PA_TELEF'],

            'diagnosticos' => $collect_diagnosticos,
            'dependencias' => $collect_dependencias,


                ]);
  }
  return $collect;
    }

    public function info_pacientes2(){

      //$pacientes = Paciente::all();
      $diag = implode("",$_GET['diagnostico']);;
      $desde = $_GET['fechadesde'];
      $desde = str_replace('/', '-', $desde);
      $desde = date("Y-m-d H:i:s", strtotime($desde));
      $hasta = $_GET['fechahasta'];
        $hasta = str_replace('/', '-', $hasta);

      $hasta = date("Y-m-d H:i:s", strtotime($hasta));


      //return $hasta;
      $diags = '';
       $diag = $_GET['diagnostico'];
       foreach ($diag as $value) {
           $diags = $diags."'".$value."',";
       }
       //return $diags;

$diags = substr ($diags, 0, strlen($diags) - 1);
$vacunas = DB::connection('sqlsrvSalud')->select("SELECT TD.TU_DIAG,pa.IDPaciente,d.Diagnostico ,dep.NOMBRE,ca.Calle_Nombre, pa.IDPaciente ,pa.PA_NOMBRE,pa.PA_APELLIDO,pa.PA_FECNAC,pa.PA_SEXO,pa.PA_CALLE,pa.PA_CALLE_NUMERO,pa.PA_TELEF,pa.PA_FECOBI
                                                    FROM PACIENTE pa INNER JOIN Turnos_C T  ON pa.IDPACIENTE=T.IDPACIENTE
                                                                    INNER JOIN TURNOS_C_DIAG TD ON TD.ID_TURNO_C=T.IDTurno_C
                                  INNER JOIN tblDependencias dep ON dep.ID=T.IDDependencia
                                                            INNER JOIN diagnostico as d ON d.DI_CODIGO = TD.TU_DIAG
                                                            LEFT JOIN vCalles as ca on ca.ID = pa.PA_CALLE
                                                    WHERE TD.TU_DIAG IN (".$diags.") and pa.PA_FECOBI  IS NULL and t.TU_FECHA between CONVERT(DATE,'".$desde."') and CONVERT(DATE,'".$hasta."') 
                                                    GROUP BY TD.TU_DIAG,pa.IDPaciente,dep.NOMBRE,d.Diagnostico  ,ca.Calle_Nombre,pa.IDPaciente,pa.PA_NOMBRE,pa.PA_APELLIDO,pa.PA_FECNAC,pa.PA_SEXO,pa.PA_CALLE,pa.PA_CALLE_NUMERO,pa.PA_TELEF,pa.PA_FECOBI
                                                    ORDER BY ca.Calle_Nombre desc");
$vacunas = json_decode(json_encode($vacunas), true);


                                                    $result = array();
                                                    foreach ($vacunas as $element) {
                                                        $result[$element['IDPaciente']][] = $element;
                                                    }

$collect = collect([]);
foreach ($result as $value) {

  $collect_diagnosticos = collect([]);
  $collect_dependencias = collect([]);
  foreach ($value as $diag) {

    if($collect_dependencias->contains('NOMBRE',$diag['NOMBRE'])) {

  }else{
    $collect_dependencias->push([
        'NOMBRE' => $diag['NOMBRE'],

    ]);
  }

  if($collect_diagnosticos->contains('id',$diag['TU_DIAG'])){

  }else{
    $collect_diagnosticos->push([
        'id' => $diag['TU_DIAG'],
        'Diagnostico' => $diag['Diagnostico'],
    ]);
  }


  }
  $collect->push([
            'paciente' => $value[0]['IDPaciente'],
            'nombre' => $value[0]['PA_NOMBRE'],
            'apellido' => $value[0]['PA_APELLIDO'],
            'PA_FECNAC' => $value[0]['PA_FECNAC'],
            'PA_SEXO' => $value[0]['PA_SEXO'],
            'PA_CALLE' => $value[0]['PA_CALLE'],
            'PA_CALLE_NUMERO' => $value[0]['PA_CALLE_NUMERO'],
            'Calle_Nombre' => $value[0]['Calle_Nombre'],
            'PA_TELEF' => $value[0]['PA_TELEF'],


            'diagnosticos' => $collect_diagnosticos,
            'dependencias' => $collect_dependencias,



                ]);
}
return $collect;
return $result;

return $vacunas->groupBy('IDPaciente');


      // ->with(['turno.paciente','turno'=>function($query){
      //                     $query->select('IDTurno_C','IDPaciente');
      //                 }])
      //
      //   ->get()
      //   ->where('turno.paciente.PA_FECOBI',NULL)
      //   ->groupBy('turno.IDPaciente');
      // return $diag;
    }

    public function buscar_familiares(){

      $datos = $_GET['d'];
    // return $datosssds;
      $familiares = Paciente::with('calle')->where('PA_CALLE',$datos['PA_CALLE'])->where('PA_CALLE_NUMERO',$datos['PA_CALLE_NUMERO'])->get();
      return view('datos.modal.familiares',compact('familiares'));
    }
}
