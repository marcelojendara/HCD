<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;


class UsuariosController extends Controller
{
  public function cambiar_contraseña(){
    //return 'llego';

    return view('paciente.abm.cambiar_contraseña');

  }

  public  function guardar_nueva_contraseña(Request $request){

    $input = $request->all();

    $user = Auth::user();

    $user->password= bcrypt( $input["password"] );

    $user->save();

    return view('mensajes.password_actualizado');

  }

  public function update_foto_perfil(Request $request){

      $user = Auth::user();

      $userid = $user->id;

      $input = $request->all();
      $file =$input['foto-perfil'];

        $destinationPath = 'images';

        $name = $file->getClientOriginalName();

        $file_name = pathinfo($name, PATHINFO_FILENAME);
        $extension = pathinfo($name, PATHINFO_EXTENSION);

        $filename = $userid."-".$file_name.".".$extension;



        $user->foto_perfil = $filename;
        $user->save();
        $upload_success = $file->move($destinationPath, $filename);
        return redirect()->back();

}
}
