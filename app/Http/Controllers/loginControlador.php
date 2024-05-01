<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Error;
use Illuminate\Http\Request;
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
                ->withErrors('Email Inválido', 'emailError')
                ->withInput();
        }



        $isPasswordRight = password_verify($request->password, $usuario[0]['pass']);

        if (!$isPasswordRight)
            return redirect()
                ->back()
                ->withErrors('password inválida', 'passwordError')
                ->withInput();

        session()->put(
            'loginSession',
            [
                'username' =>  $usuario[0]['username'],
                'email' =>  $usuario[0]['email'],
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
