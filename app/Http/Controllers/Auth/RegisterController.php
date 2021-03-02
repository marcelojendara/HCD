<?php

namespace App\Http\Controllers\Auth;

use App\TBLUsuario;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function crearusaurios()
    {
        $usuarios = TBLUsuario::whereIn('LEGAJO',['16719'])->get();
     //return $usuarios;
        foreach ($usuarios as $usuario) {

          //$user = User::where('username','=',trim($usuario->LEGAJO))->orWhere('name',$usuario->NOMBRE)->first();
       //return $user;
          if (isset($user)) {
            // code...
          }else{
            User::create([
               'name' => trim($usuario->NOMBRE),
               'username'=>trim($usuario->LEGAJO),
               'email' => trim($usuario->LEGAJO),
               'legajo' => trim($usuario->LEGAJO),
               'tipo' => trim($usuario->TIPO),
               'activo' => trim($usuario->ACTIVO),
               'oficina' => trim($usuario->OFICINA),
               'area' => trim($usuario->AREA),
               'funcion' => trim($usuario->FUNCION),
               'matricula' => trim($usuario->MATRICULA),
               'tbc' => trim($usuario->TBC),
               'admsisalud' => trim($usuario->ADMSISALUD),
               'turnos' => trim($usuario->TURNOS),
               'legajo_hospital' => trim($usuario->LEGAJOHOSPITAL),
               'paps' => trim($usuario->PAPS),
               'password' => bcrypt(trim($usuario->CLAVE)),

           ]);
          }

       };
        return 'usuarios creados con exito';
        
    }
}
