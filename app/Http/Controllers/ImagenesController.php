<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Paciente;

use SoapClient;

class ImagenesController extends Controller
{

  private $urlImagen = "http://192.168.3.200/";
    public function historia_clinica_imagenes(){

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


                $url =  $this->urlImagen;
                $servicioturnos=$url."webservice/imagenes.php?wsdl";
                $parametrosentrada=array();
                $parametrosentrada['hiscli'] = $historia_clinica;


                $client = new SoapClient($servicioturnos);
                $result = $client->historialImagenes($parametrosentrada);
                $result = json_decode($result,true);
                 $renglonescollect = collect([]);
                 //return $result;
                 if ($result['error'] == 0) {
                   foreach ($result['turnos'] as $turno) {

                     $parametrospaps=array();
                     $parametrospaps['id'] = $turno['id_turno'];
                     $detalledicom = $client->detalleDicom($parametrospaps);
                     $informe = $client->detalleTurno($parametrospaps);

                     $detalledicom = json_decode($detalledicom,true);
                     $informe = json_decode($informe,true);

                      $imagenes = collect([
                        'id_turno' => $turno['id_turno'],
                        'fecha' => $turno['fecha'],
                        'hora' => $turno['hora'],
                        'esp_efectora' => $turno['esp_efectora'],
                        'med_solicitante' => $turno['med_solicitante'],
                        'esp_solicitante' => $turno['esp_solicitante'],
                        'detalledicom' => $detalledicom,
                        'informe' => $informe['detalle'][0]['informe']

                      ]);
                      $renglonescollect->push($imagenes);

                   }
                   //return $renglonescollect;
                   $historia_clinica_imagenes = json_encode($renglonescollect,true);

                   return view('paciente.historia_clinica.imagenes',compact('historia_clinica_imagenes'));
                 }else{
                   $historia_clinica_imagenes = 'El Paciente no posee imagenes';
                    return view('paciente.historia_clinica.imagenes',compact('historia_clinica_imagenes'));
                 }


    }

    public function buscar_imagenes(){

      $idturno =  $_GET['id_turno'];
      //return $idturno;
      $renglonescollect = collect([]);
      $parametrospaps=array();
      $parametrospaps['id'] = $idturno; //id paps

      $url =  $this->urlImagen;
      $servicioturnos="http://192.168.3.200/webservice/imagenes.php?wsdl";
       $client = new SoapClient($servicioturnos);
       $result = $client->detalleImagenes($parametrospaps);
       $detalledicom = $client->detalleDicom($parametrospaps);


        //   $imginfo = getimagesize($remoteImage);
        //   header("Content-type: {$imginfo['mime']}");
        // $imagen =  readfile($remoteImage);


       $result1 = json_decode($result,true);
       $detalledicom = json_decode($detalledicom,true);

       //return $detalledicom;
       if ($detalledicom['error'] == 0) {
         $carpeta =  $detalledicom['carpeta_img'];
         //return $carpeta;
         $tipo =  $detalledicom['tipo'];
         if ($tipo == 'TC') {
           for ($i=0; $i < 100; $i++) {
             $estudio =  $detalledicom['estudio'];
             $cant_estudios =  $detalledicom['cant_estudios'];
             $remoteImage = $url. $carpeta. $tipo.'/'.$estudio.'/'. $cant_estudios.'/'. "jpg/".$i.".jpg";
             $imagentn = $url. $carpeta. $tipo.'/'.$estudio.'/'. $cant_estudios.'/'. "jpg/tn/".$i.".jpg";

             $imagenes = collect([

               'detalle_imagen' => $result1,
               'imagen' => $remoteImage,
               'dellatedicom' => $detalledicom,
               'imagentn' => $imagentn

             ]);

             $renglonescollect->push($imagenes);
           }
         }else{
           $estudio =  $detalledicom['estudio'];
           $cant_estudios =  $detalledicom['cant_estudios'];
           $remoteImage = $url. $carpeta. $tipo.'/'.$estudio.'/'. $cant_estudios.'/'. "jpg/1.jpg";
           $imagentn = $url. $carpeta. $tipo.'/'.$estudio.'/'. $cant_estudios.'/'. "jpg/tn/1.jpg";

           $imagenes = collect([

             'detalle_imagen' => $result1,
             'imagen' => $remoteImage,
             'dellatedicom' => $detalledicom,
             'imagentn' => $imagentn

           ]);

           $renglonescollect->push($imagenes);
         }

       }else{
         $remoteImage = "";
       }




       $historia_clinica_imagenes = $renglonescollect;

       //return $historia_clinica_imagenes;




      return view('modals.modal_imagenes',compact('historia_clinica_imagenes'));
    }

    public function detalle_informe(){
      $idturno =  $_GET['id_turno'];
     //$idturno = 123261;
      //return $idturno;
      $renglonescollect = collect([]);
      $parametrospaps=array();
      $parametrospaps['id'] = $idturno; //id paps

      $url =  $this->urlImagen;
      $servicioturnos="http://192.168.3.200/webservice/imagenes.php?wsdl";
       $client = new SoapClient($servicioturnos);
       $result = $client->detalleInforme($parametrospaps);



       $result = json_decode($result,true);
       return $result;

    }

}
