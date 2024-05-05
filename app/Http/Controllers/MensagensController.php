<?php

namespace App\Http\Controllers;

use App\Mail\UserMessage;
use App\Models\Mensagens;
use Illuminate\Http\Request;
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
                'conteudo.min' => 'conteudo deve ter até 50 caracteres',
                'conteudo.max' => 'conteudo deve ter até 50 caracteres',
            ]
        );

        $mensagens =  new Mensagens();

        $mensagens->nome = $request->nome;
        $mensagens->email = $request->email;
        $mensagens->conteudo = $request->conteudo;
        $mensagens->save();

        $fromEmail = $request->email;
        $subject = 'Mensagem de availiação da aplicação';
        $message = $request->conteudo;

        Mail::to($fromEmail)->send(new UserMessage(
            $message,
            $subject,
        ));


        return view('home');
    }

    /**
     * Display the speclified resource.
     */
    public function show(Mensagens $mensagens)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mensagens $mensagens)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mensagens $mensagens)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mensagens $mensagens)
    {
        //
    }
}
