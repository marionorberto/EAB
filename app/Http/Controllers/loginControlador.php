<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\error;

class loginControlador extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function login(Request $request)
    {
        $usuarios = new Usuarios();

        $usuario = $usuarios::where('email', $request->email)->get()->toArray();

        if (Count($usuario) <= 0) {

            return redirect()
                ->back()
                ->with(["emailError" => "Email inválido"])
                ->withInput($request->all());
        }

        $isPasswordRight = password_verify($request->password, $usuario[0]['pass']);

        if (!$isPasswordRight) {
            return redirect()
                ->back()
                ->with(["passwordError" => "Password inválida"])
                ->withInput($request->all());
        }

        $auxUsuario = $usuario[0]['idUsuario'];
        $urlUsuario = DB::connection()->select("
            select url
            from UsuarioImagens
            where idUsuario= '$auxUsuario'
        ");

        session()->put(
            'loginSession',
            [
                'username' =>  $usuario[0]['username'],
                'email' =>  $usuario[0]['email'],
                'urlImgUsuario' =>  $urlUsuario[0]->url
            ]
        );

        return redirect()
            ->route('consultas.index');
    }

    public function logout()
    {
        session()->flush('loginSession');

        return redirect()->route('login');
    }
}
