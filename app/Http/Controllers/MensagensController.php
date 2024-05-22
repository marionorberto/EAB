<?php

namespace App\Http\Controllers;

use App\Mail\UserMessage;
use App\Models\Mensagens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MensagensController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'nome' => 'required|min:3|max:50',
                'email' => 'required|max:50|email',
                'conteudo' => 'required|min:15|max:150'
            ],
            [
                'nome.required' => 'nome é um campo requerido.',
                'nome.min' => 'nome deve estar entre 3 à 50.',
                'nome.max' => 'nome deve estar entre 3 à 50.',
                'email.required' => 'email é um campo requerido',
                'email.email' => 'email inválido',
                'email.max' => 'email deve ter até 50 caracteres',
                'conteudo.required' => 'email  50 caracteres',
                'conteudo.min' => 'conteudo deve ter entre 15 até 150 caracteres',
                'conteudo.max' => 'conteudo deve ter entre 15 até 150  caracteres',
            ]
        );

        $mensagens =  new Mensagens();

        $mensagens->nome = $request->nome;
        $mensagens->email = $request->email;
        $mensagens->conteudo = $request->conteudo;
        $mensagens->save();

        return view('home');
    }

    public function show(Mensagens $mensagens)
    {
        //
    }

    public function edit(Mensagens $mensagens)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        DB::connection()->select("
            update Mensagens
            set status = 'lida'
            where idMensagem = '$id'
        ");

        return redirect()->back()->with(["smsLida" => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mensagens $mensagens)
    {
        //
    }
}
