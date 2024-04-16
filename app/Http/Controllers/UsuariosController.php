<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'firstname' => 'required|min:3|max:30',
                'lastname' => 'required|min:3|max:30',
                'username' => 'required|min:3|max:30|unique:Usuarios',
                'email' => 'required|unique:Usuarios|max:40|email',
                'password' => 'required|max:30|min:8',
                'sexo' => 'required|max:1|min:1',
                'naturalidade' => 'required',
                'telefone' => 'required|min:9|max:15',
                'bi' => 'required|min:15|max:15|unique:Usuarios',
            ],
            [
                'firstname.required' => 'Este campo é requerido.',
                'firstname.max' => 'Primeiro Nome deve ter entre 3 à 30 caracteres.',
                'firstname.min' => 'Primeiro Nome deve ter entre 3 à 30 caracteres.',
                'lastname.required' => 'Este campo é requerido.',
                'lastname.min' => 'Último Nome deve ter entre 3 à 30 caracteres.',
                'lastname.max' => 'Último Nome deve ter entre 3 à 30 caracteres.',
                'username.required' => 'Este campo é requerido.',
                'username.unique' => 'username já cadastrado.',
                'username.max' => 'username deve ter entre 3 à 30 caracteres.',
                'username.min' => 'username deve ter entre 3 à 30 caracteres.',
                'telefone.required' => 'Este campo é requerido.',
                'telefone.max' => 'telefone deve ter entre 9 à 15 caracteres.',
                'telefone.min' => 'telefone deve ter entre 9 à 15 caracteres.',
                'email.required' => 'Este campo é requerido.',
                'email.unique' => 'Email já cadastrado.',
                'email.max' => 'Email deve ter no máximo 40 caracteres .',
                'email' => 'Email inválido (exemplo@gmail.com)',
                'sexo.required' => 'Sexo é um campo requerido.',
                'sexo.max' => 'Apenas 1 carater permetido.',
                'sexo.min' => 'Apenas 1 carater permetido.',
                'password.required' => 'Password é um campo requerido.',
                'password.max' => 'Password deve ter entre 8 à 30 caracteres.',
                'password.min' => 'Password deve ter entre 8 à 30 caracteres.',
                'bi.min' => 'BI deve ter 15 carateres.',
                'bi.max' => 'BI deve ter 15 carateres.',
                'bi.required' => 'BI é requerido.',
                'bi.unique' => 'BI já cadastrado',
            ]
        );

        $usuario = new Usuarios();

        $isPasswordsEquals = $request->password == $request->repeat_password;

        if (!$isPasswordsEquals) return view('register', ['passwordError' => 'password não coincidem']);

        $usuario->firstname = $request->firstname;
        $usuario->lastname = $request->lastname;
        $usuario->username = $request->username;
        $usuario->BI = $request->bi;
        $usuario->sexo = $request->sexo;
        $usuario->email = $request->email;
        $usuario->pass = Hash::make($request->password);
        $usuario->naturalidade = $request->naturalidade;

        $usuario->save();

        return view('login');
    }

    public function show(Usuarios $usuarios)
    {
        //
    }

    public function edit(Usuarios $usuarios)
    {
        //
    }

    public function update(Request $request, Usuarios $usuarios)
    {
        //
    }

    public function destroy(Usuarios $usuarios)
    {
        //
    }
}
