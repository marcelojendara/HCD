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

use App\PlantillasEco;

use App\EcografiaPaciente;

use App\EcografiaImagen;

use \Illuminate\Support\Facades\DB;

use SoapClient;

use PDF;

class EcografiaController extends Controller
{
    public function nueva_ecofrafia(){

      $user = Auth::user();

      $idpaciente =  $_GET['idpaciente'];



      $medico = Medico::where('ME_MAT',$user->matricula)->with('especialidad')->first();
      //return $medico;
      $diagnosticos = Diagnostico::where('SELECCIONABLE',true)->get();
      $medico_dependencia = Dependencia::where('ID',$user->oficina)->first();
      //return $medico_dependencia;
      $dependencias = Dependencia::All();
      //return $dependencias;
      $plantillas = PlantillasEco::all();
      return view('formularios.ecografias.nueva2',compact('user','medico','diagnosticos','idpaciente','medico_dependencia','dependencias','plantillas'));
    }

    public function nueva_ecografia(Request $request){

      $input = $request->all();

      $user = Auth::user();

      //return $user->matricula;

      $ecografia_paciente = New EcografiaPaciente;

     $ecografia_paciente->paciente_id = $input['pacienteid'];

     $ecografia_paciente->planilla_id = $input['eco_id'];

     $ecografia_paciente->informe = $input['plantilla'];

     $ecografia_paciente->profesional_mat = $user->matricula;

     $ecografia_paciente->dependencia_id = $user->oficina;

     $ecografia_paciente->save();

     foreach ($input['imagenes'] as $imagen) {

       //return $imagen;
       $ecografias_imagen = new EcografiaImagen;



       $destinationPath = 'Ecografias';

       $carpeta = $ecografia_paciente->id;

       $fecha = $ecografia_paciente->created_at;


       $name = $imagen->getClientOriginalName();

       $file_name = pathinfo($name, PATHINFO_FILENAME);
       $extension = pathinfo($name, PATHINFO_EXTENSION);

       $filename = $ecografia_paciente->id."-".$fecha."-".$file_name.".".$extension;


      $ecografias_imagen->imagen = $ecografia_paciente->id;
       $ecografias_imagen->imagen = $destinationPath."/".$carpeta."/".$filename;
       $ecografias_imagen->save();

       $destinationPath = 'uploads/Ecografias'."/".$carpeta;
       $upload_success = $imagen->move($destinationPath, $filename);


     }



     $paciente = Paciente::where('IDPaciente',$input['pacienteid'])->first();

     //return $paciente;
     //return back()->withInput(['tipo_documento' => $paciente->IDTipoDoc,'num_documento' =>$paciente->PA_NUMDOC ]);

     return redirect()->route('buscar_paciente_dni', ['tipo_documento'=>$paciente->IDTipoDoc,'num_documento'=>$paciente->PA_NUMDOC ]);
      return 'creado con exito';
    }

    public function lista_eco(){

      return  PDF::loadHTML('<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><link rel="stylesheet" type="text/css" id="u0" crossorigin="anonymous" referrerpolicy="origin" href="https://cdn.tiny.cloud/1/no-api-key/tinymce/5.4.2-90/skins/ui/oxide/content.min.css"><link rel="stylesheet" type="text/css" id="u1" crossorigin="anonymous" referrerpolicy="origin" href="https://cdn.tiny.cloud/1/no-api-key/tinymce/5.4.2-90/skins/content/default/content.min.css"></head><body id="tinymce" class="mce-content-body " data-id="editor" contenteditable="true" spellcheck="false"><p style="margin-bottom: 0.35cm"><font style="font-size: 14pt">Edad gestacional:&nbsp; &nbsp; &nbsp; &nbsp;Estudios
previos:    SI   /   NO</font></p><p style="margin-bottom: 0.35cm"><br>
<br>

</p><p align="center" style="margin-bottom: 0.35cm"><font style="font-size: 16pt"><u><b>ECOGRAFÍA
OBSTÉTRICA – EMBARAZO GEMELAR</b></u></font></p><p align="center" style="margin-bottom: 0.35cm"><font style="font-size: 14pt">Monocorial……
    Bicorial……     Monoamniótico……    Biamniótico…….</font></p><p style="margin-bottom: 0.35cm"><br>
<br>

</p><table width="1119" cellpadding="7" cellspacing="0" data-mce-style="border-collapse: collapse; width: 100%; height: 866px; margin-left: auto; margin-right: auto;" style="border-collapse: collapse; width: 100%; height: 866px; margin-left: auto; margin-right: auto;" class="mce-item-table">
	<colgroup><col width="333">

	<col width="333">

	</colgroup><tbody><tr valign="top">
		<td height="12" style="border-color: rgb(0, 0, 0); padding: 0cm 0.19cm 0cm 0.2cm; width: 521.281px;"><p align="center">
			<font style="font-size: 14pt"><b>FETO I</b></font></p>
		</td>
		<td style="border-color: rgb(0, 0, 0); padding: 0cm 0.19cm 0cm 0.2cm; width: 565.281px;"><p align="center">
			<font style="font-size: 14pt"><b>FETO II</b></font></p>
		</td>
	</tr>
	<tr valign="top">
		<td height="13" style="border-color: rgb(0, 0, 0); padding: 0cm 0.19cm 0cm 0.2cm; width: 521.281px;"><p>
			<font style="font-size: 14pt">Presentación:</font></p>
		</td>
		<td style="border-color: rgb(0, 0, 0); padding: 0cm 0.19cm 0cm 0.2cm; width: 565.281px;"><p>
			<font style="font-size: 14pt">Presentación:</font></p>
		</td>
	</tr>
	<tr valign="top">
		<td height="13" style="border-color: rgb(0, 0, 0); padding: 0cm 0.19cm 0cm 0.2cm; width: 521.281px;"><p>
			<font style="font-size: 14pt">Situación:</font></p>
		</td>
		<td style="border-color: rgb(0, 0, 0); padding: 0cm 0.19cm 0cm 0.2cm; width: 565.281px;"><p>
			<font style="font-size: 14pt">Situación:</font></p>
		</td>
	</tr>
	<tr valign="top">
		<td height="13" style="border-color: rgb(0, 0, 0); padding: 0cm 0.19cm 0cm 0.2cm; width: 521.281px;"><p>
			<font style="font-size: 14pt">Dorso:</font></p>
		</td>
		<td style="border-color: rgb(0, 0, 0); padding: 0cm 0.19cm 0cm 0.2cm; width: 565.281px;"><p>
			<font style="font-size: 14pt">Dorso:</font></p>
		</td>
	</tr>
	<tr valign="top">
		<td height="13" style="border-color: rgb(0, 0, 0); padding: 0cm 0.19cm 0cm 0.2cm; width: 521.281px;"><p>
			<font style="font-size: 14pt">Líquido amniótico:</font></p>
		</td>
		<td style="border-color: rgb(0, 0, 0); padding: 0cm 0.19cm 0cm 0.2cm; width: 565.281px;"><p>
			<font style="font-size: 14pt">Líquido amniótico:</font></p>
		</td>
	</tr>
	<tr valign="top">
		<td height="13" style="border-color: rgb(0, 0, 0); padding: 0cm 0.19cm 0cm 0.2cm; width: 521.281px;"><p>
			<font style="font-size: 14pt">Placenta:</font></p>
		</td>
		<td style="border-color: rgb(0, 0, 0); padding: 0cm 0.19cm 0cm 0.2cm; width: 565.281px;"><p>
			<font style="font-size: 14pt">Placenta:</font></p>
		</td>
	</tr>
	<tr valign="top">
		<td height="13" style="border-color: rgb(0, 0, 0); padding: 0cm 0.19cm 0cm 0.2cm; width: 521.281px;"><p>
			<font style="font-size: 14pt">Cinética cardíaca:</font></p>
		</td>
		<td style="border-color: rgb(0, 0, 0); padding: 0cm 0.19cm 0cm 0.2cm; width: 565.281px;"><p>
			<font style="font-size: 14pt">Cinética cardíaca:</font></p>
		</td>
	</tr>
	<tr valign="top">
		<td height="13" style="border-color: rgb(0, 0, 0); padding: 0cm 0.19cm 0cm 0.2cm; width: 521.281px;"><p>
			<font style="font-size: 14pt">Movimientos fetales:</font></p>
		</td>
		<td style="border-color: rgb(0, 0, 0); padding: 0cm 0.19cm 0cm 0.2cm; width: 565.281px;"><p>
			<font style="font-size: 14pt">Movimientos fetales:</font></p>
		</td>
	</tr>
	<tr valign="top">
		<td height="145" style="border-color: rgb(0, 0, 0); padding: 0cm 0.19cm 0cm 0.2cm; width: 521.281px;"><p style="margin-bottom: 0cm">
			<font style="font-size: 14pt">Biometría fetal:</font></p>
			<p style="margin-bottom: 0cm"><font style="font-size: 14pt">LCC:
			….… mm</font></p>
			<p style="margin-bottom: 0cm"><font style="font-size: 14pt">DBP:
			….… mm</font></p>
			<p style="margin-bottom: 0cm"><font style="font-size: 14pt">PC:
			….… mm</font></p>
			<p style="margin-bottom: 0cm"><font style="font-size: 14pt">PA:
			….… mm</font></p>
			<p><font style="font-size: 14pt">LF: …….. mm</font></p>
		</td>
		<td style="border-color: rgb(0, 0, 0); padding: 0cm 0.19cm 0cm 0.2cm; width: 565.281px;"><p style="margin-bottom: 0cm">
			<font style="font-size: 14pt">Biometría fetal:</font></p>
			<p style="margin-bottom: 0cm"><font style="font-size: 14pt">LCC:
			….… mm</font></p>
			<p style="margin-bottom: 0cm"><font style="font-size: 14pt">DBP:
			….… mm</font></p>
			<p style="margin-bottom: 0cm"><font style="font-size: 14pt">PC:
			….… mm</font></p>
			<p style="margin-bottom: 0cm"><font style="font-size: 14pt">PA:
			….… mm</font></p>
			<p><a name="_GoBack" class="mce-item-anchor"></a><font style="font-size: 14pt">LF:
			….… mm</font></p>
		</td>
	</tr>
	<tr valign="top">
		<td height="39" style="border-color: rgb(0, 0, 0); padding: 0cm 0.19cm 0cm 0.2cm; width: 521.281px;"><p style="margin-bottom: 0cm">
			<font style="font-size: 14pt">Peso: ……….  grs</font></p>
			<p><font style="font-size: 14pt">Percentilo: …….</font></p>
		</td>
		<td style="border-color: rgb(0, 0, 0); padding: 0cm 0.19cm 0cm 0.2cm; width: 565.281px;"><p style="margin-bottom: 0cm">
			<font style="font-size: 14pt">Peso: ………… grs</font></p>
			<p><font style="font-size: 14pt">Percentilo: …….</font></p>
		</td>
	</tr>
	<tr valign="top">
		<td height="13" style="border-color: rgb(0, 0, 0); padding: 0cm 0.19cm 0cm 0.2cm; width: 521.281px;"><p>
			<font style="font-size: 14pt">Edad ecográfica:</font></p>
		</td>
		<td style="border-color: rgb(0, 0, 0); padding: 0cm 0.19cm 0cm 0.2cm; width: 566.281px;"><p>
			<font style="font-size: 14pt">Edad ecográfica:</font></p>
		</td>
	</tr>
</tbody></table><p style="margin-bottom: 0.35cm"><br>
<br>

</p><p style="margin-bottom: 0.35cm">






</p><p style="margin-bottom: 0.35cm"><font style="font-size: 14pt">Observaciones:&nbsp;</font>
</p><p><br data-mce-bogus="1"></p><p></p></body></html>')->setPaper('a4')->download('mi-archivo3.pdf');
    $pdf->loadHTML('<h1>Styde.net</h1>');
    $dompdf->set_option('dpi', 256);
    return $pdf->download('mi-archivo.pdf');

      $plantillas = PlantillasEco::all();

      return $plantillas;
    }
}
