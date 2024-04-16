<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;

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

        if (Count($usuario) <= 0)
            return view('login', ['emailError' => 'Email inválido']);


        $isPasswordRight = password_verify($request->password, $usuario[0]['pass']);

        if (!$isPasswordRight)
            return view('login', ['passwordError' => 'Password inválida']);

        session()->put(
            'loginSession',
            [
                'username' =>  $usuario[0]['username'],
                'email' =>  $usuario[0]['email'],
            ]
        );

        return redirect()->route('consultas.index');
    }

    public function logout()
    {
        return session()->flush('loginSession');
    }
}
