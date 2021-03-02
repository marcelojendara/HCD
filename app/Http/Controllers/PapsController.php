<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Paciente;

use SoapClient;

class PapsController extends Controller
{
  public function historico_biopsias(){

    $id_paciente =  $_GET['idpaciente'];

    $paciente = Paciente::Where('IDPaciente',$id_paciente)->first();

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



     $servicioturnos="http://192.168.3.200/webservice/biopsias.php?wsdl";
     $parametrosturnos=array();
     $parametrosturnos['hc'] = $historia_clinica;
     //$parametrosturnos['hc'] = "217955";

    $client = new SoapClient($servicioturnos);
    $result = $client->historicoBiopsias($parametrosturnos);


     $result = json_decode($result,true);
      //return $result;
     $renglonescollect = collect([]);
     if (isset($result['biopsias'])) {

       foreach ($result['biopsias'] as $bio) {

         $num_biopsia = $bio['NUMERO_BIOPSIA'];

         $parametrospaps=array();
         $parametrospaps['idbiopsia'] = $num_biopsia; //id paps

          $client = new SoapClient($servicioturnos);
          $result = $client->informeBiopsia($parametrospaps);

          $result1 = json_decode($result,true);
          $paps = collect([
            'NUMERO_BIO' => $bio['NUMERO_BIOPSIA'],
            'FECHA' => $bio['FECHA'],
            'HORA' => $bio['HORA'],
            'ESTADO' => $bio['ESTADO'],
            'DESC_ESTADO' => $bio['DESC_ESTADO'],
            'paps' => $result1

          ]);
          $renglonescollect->push($paps);

       }

       //return $renglonescollect;
       $historia_clinica_biopsias = json_encode($renglonescollect,true);

     }else{
       $historia_clinica_biopsias = null;
     }


     return view('paciente.historia_clinica.biopsias',compact('historia_clinica_biopsias'));

  }

  public function historico_paps(){

      $id_paciente =  $_GET['idpaciente'];

      $paciente = Paciente::Where('IDPaciente',$id_paciente)->first();

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

      $servicioturnos="http://192.168.3.200/webservice/paps.php?wsdl"; //url del servicio turnos

        $parametrosturnos=array();
        $parametrosturnos['hc'] = $historia_clinica;
        //$parametrosturnos['hc'] = "217955";

       $client = new SoapClient($servicioturnos);
       $result = $client->historicoPaps($parametrosturnos);

    //  $servicioturnos="http://192.168.3.200/webservice/biopsias.php?wsdl";
    //  $parametrosturnos=array();
    //  $parametrosturnos['hc'] = $historia_clinica;
    //  //$parametrosturnos['hc'] = "217955";
    //
    // $client = new SoapClient($servicioturnos);
    // $result = $client->historicoBiopsias($parametrosturnos);


       $result = json_decode($result,true);
        //return $result;
       $renglonescollect = collect([]);
       if (isset($result['paps'])) {
         foreach ($result['paps'] as $paps) {

           $id_pap = $paps['NUMERO_PAP'];

           $parametrospaps=array();
           $parametrospaps['idpap'] = $id_pap; //id paps

            $client = new SoapClient($servicioturnos);
            $result = $client->informePap($parametrospaps);

            $result = json_decode($result,true);
            $paps = collect([
              'NUMERO_PAP' => $paps['NUMERO_PAP'],
              'FECHA' => $paps['FECHA'],
              'HORA' => $paps['HORA'],
              'ESTADO' => $paps['ESTADO'],
              'DESC_ESTADO' => $paps['DESC_ESTADO'],
              'paps' => $result

            ]);
            $renglonescollect->push($paps);

         }

         //return $renglonescollect;
         $historia_clinica_paps = json_encode($renglonescollect,true);
       }else{
         $historia_clinica_paps = null;
       }


       return view('paciente.historia_clinica.paps',compact('historia_clinica_paps'));


       return $result['paps'];

       $decoded = base64_decode($result['pap_informe']);
        $file = 'Pap.pdf';
        file_put_contents($file, $decoded);

        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        }

       return 'correcto';


    }
}
