<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
  Auth::routes();

  route::get('login2',function () {
      return view('auth.login2');
    });
    route::get('script',function () {
        return view('script');
      });

  route::get('callapi','PacienteController@CallAPI');

  route::get('crearusuarios','Auth\RegisterController@crearusaurios');


route::get('pruebasql','PacienteController@pruebasql');
Route::get('/', function () {
    return redirect('buscar_paciente');
});
route::get('pacientes_riesgo','InfoController@pacientes_riesgo');
route::get('pacientes_riesgo2','InfoController@pacientes_riesgo2');
route::get('info','InfoController@info_pacientes');
route::get('info2','InfoController@info_pacientes2');
route::get('buscar_familiares','InfoController@buscar_familiares');

Route::group(['middleware' => 'auth'], function () {


  route::post('update_foto_perfil','UsuariosController@update_foto_perfil');

  route::get('cambiar_contraseña','UsuariosController@cambiar_contraseña');

  route::post('guardar_nueva_contraseña','UsuariosController@guardar_nueva_contraseña');

  route::get('pruebaswebservice','HospitalMunucipalController@pruebas_web_service');

  route::get('buscar_paciente','PacienteController@buscarpaciente');

  route::get('buscar_paciente_dni','PacienteController@buscar_paciente_dni')->name('buscar_paciente_dni');

  route::get('buscar_paciente_dni2','PacienteController@buscar_paciente_dni2')->name('buscar_paciente_dni2');

  route::get('vacunacion_paciente','PacienteController@vacunacion_paciente');

  route::get('detalle_vacunas','PacienteController@detalle_vacunas');

  route::get('medicacion_paciente','PacienteController@medicacion_paciente');


  route::get('hse_del_dia','PacienteController@hse_del_dia');

  route::get('formulario_editar_hse','PacienteController@formulario_editar_hse');

  route::post('editar_consulta','PacienteController@editar_consulta');

  route::post('formulario_eliminar_hse','PacienteController@formulario_eliminar_hse');

  route::post('eliminar_consulta','PacienteController@eliminar_consulta');







  route::get('form_nueva_consulta','PacienteController@form_nueva_consulta');

    route::get('nueva_ecofrafia','EcografiaController@nueva_ecofrafia');

    route::post('nueva_ecografia','EcografiaController@nueva_ecografia');


      route::get('lista_eco','EcografiaController@lista_eco');

  route::get('modificar_datos_paciente','PacienteController@modificar_datos_paciente');

    route::post('paciente_datos_update','PacienteController@paciente_datos_update');

  route::post('paciente_datos_create','PacienteController@paciente_datos_create');


  route::get('historia_clinica_unidades_sanitarias','PacienteController@historia_clinica_unidades_sanitarias');

  route::get('historia_clinica_completa','PacienteController@historia_clinica_completa');

  route::get('historia_clinica_consultorio_externo','HospitalMunucipalController@historia_clinica_consultorio_externo');

  route::get('detalle_turno_hospital','HospitalMunucipalController@detalle_turno_hospital');

  route::get('historia_clinica_odontologia','OdontologiaController@historia_clinica_odontologia');

  route::get('buscar_examen_fisico','PacienteController@buscar_examen_fisico');

    route::get('ultimo_examen_fisico','PacienteController@ultimo_examen_fisico');






  Route::get('/home', 'HomeController@index');



  route::post('nueva_consulta_create','PacienteController@nueva_consulta_create');

  route::get('nuevo_odontograma','PacienteController@nuevo_odontograma');

  route::post('guardar_odontograma','PacienteController@guardar_odontograma');


  //---------------------paps web service----------------------------//

  route::get('historico_paps','PapsController@historico_paps');

    route::get('historico_biopsias','PapsController@historico_biopsias');


//--------------------- imagenes web service------------------------

route::get('historia_clinica_imagenes','ImagenesController@historia_clinica_imagenes');

route::get('buscar_imagenes','ImagenesController@buscar_imagenes');

route::get('detalle_informe','ImagenesController@detalle_informe');






  //---------------------------------boletines pdf-------------------------)

  Route::get('boletines_epidemiologicos', function () {
      return view('boletines.epidemiologicos');
  });

  Route::get('fichas_de_notificacion', function () {
      return view('boletines.fichas_de_notificacion');
  });

  Route::get('alertas_epidemiologicos', function () {
      return view('boletines.alertas_epidemiologicos');
  });

  Route::get('guias_de_practicas', function () {
      return view('boletines.guias_de_practicas');
  });
  Route::get('guias_de_practicasa', function () {
    return view('boletines.coronavirus');
});

Route::get('casaporcasa', function () {
  return view('boletines.programacasaxcasa');
});


});

Auth::routes();

Route::get('/home', 'HomeController@index');
