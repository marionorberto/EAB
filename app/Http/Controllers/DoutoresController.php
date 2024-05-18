<?php

namespace App\Http\Controllers;

use App\Models\Doutores;
use App\Models\PedidoVagaDoutor;
use App\Models\PedidoVagaDoutorCurriculum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DoutoresController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        if (@Session('loginSession')['tipoUsuario'] == 'admin') {
            return redirect()->back();
        }

        return view('doutor.store');
    }

    public function store(Request $request)
    {


        $validator = Validator::make(
            $request->all(),
            [
                'firstname' => 'required|min:3|max:30',
                'lastname' => 'required|min:3|max:30',
                'carteiraProfissional' => 'required|max:9',
                'telefone' => 'required|min:9|max:15',
                'nacionalidade' => 'required|min:8|max:11',
                'sexo' => 'required|max:1',
                'email' => 'required|min:10|max:30',
                'especialidade' => 'required|min:8|max:12',
                'experiencia' => 'required|max:2',
                'endereco' => 'required|min:10|max:35',
                'cv' => 'required',
                'motivo' => 'required|min:10'
            ],
            [
                'firstname.required' => 'Primeiro Nome é um campo requerido.',
                'firstname.max' => 'Primeiro Nome deve ter entre 3 à 30 caracteres.',
                'firstname.min' => 'Primeiro Nome deve ter entre 3 à 30 caracteres.',
                'lastname.required' => 'Último Nome é um campo requerido.',
                'lastname.min' => 'Último Nome deve ter entre 3 à 30 caracteres.',
                'lastname.max' => 'Último Nome deve ter entre 3 à 30 caracteres.',
                'telefone.required' => 'Telefone é um campo requerido.',
                'telefone.max' => 'telefone deve ter entre 9 à 15 caracteres.',
                'telefone.min' => 'telefone deve ter entre 9 à 15 caracteres.',
                'nacionalidade.required' => 'nacionalidade é um campo requerido.',
                'carteiraProfissional.max' => 'Carteira Profissional deve ter 9 caracteres',
                'carteiraProfissional.min' => 'Carteira Profissional deve ter 9 caracteres',
                'nacionalidade.min' => 'nacionalidade mal preenchido.',
                'nacionalidade.max' => 'nacionalidade mal preenchido.',
                'motivo.required' => 'Motivo da consulta é campo requerido.',
                'motivo.min' => 'Motivo da consulta deve ter no mínimo 10 caracteres.',
                'cv.required' => 'Documento não carregado. clique em cima para carregar.',
                'endereco.required' => 'Endereco é um campo obrigatório.',
                'endereco.max' => 'Endereco deve ter entre 10 à 35 caracteres.',
                'endereco.min' => 'Endereco deve ter entre 10 à 35 caracteres.',
                'experiencia.required' => 'Experiencia é um campo obrigatório.',
                'experiencia.max' => 'Experiencia não preenchido devidamente.',
                'especialidade.required' => 'Especialidade é um campo obrigatório.',
                'especialidade.min' => 'Especialidade não preenchido devidamente.',
                'especialidade.max' => 'Especialidade não preechido devidamente.',
                'email.required' => 'Email é um campo obrigatório.',
                'email.max' => 'Email deve ter entre 10 à 30 caracteres.',
                'email.min' => 'Email deve ter entre 10 à 30 caracteres.',
                'sexo.required' => 'Sexo é obrigatório',
                'sexo.min' => 'Sexo não preenchido devidamente.',
                'sexo.max' => 'Sexo não preenchido devidamente.',
            ]
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput($request->all());
        }


        $isStringFirstnameIncorrect = count(explode(" ", $request->firstname)) > 1;
        $isStringLastnameIncorrect = count(explode(" ", $request->lastname)) > 1;

        if ($isStringFirstnameIncorrect || $isStringLastnameIncorrect) {
            return redirect()
                ->back()
                ->with(
                    ["namesIncorret" => true]
                )
                ->withInput($request->all());
        }

        $formatDocsAvailable = ["pdf"];
        $flag = false;

        for ($i = 0; $i < count($formatDocsAvailable); $i++) {
            if ($formatDocsAvailable[$i] == $request->file('cv')->getClientOriginalExtension())
                $flag  = true;
        }

        if ($flag == false) {
            return redirect()
                ->back()
                ->with(
                    ["fileFormatError" => true]
                )
                ->withInput($request->all());
        }

        $pedidoVagaDoutor = new PedidoVagaDoutor();

        $pedidoVagaDoutor->firstname = $request->firstname;
        $pedidoVagaDoutor->lastname = $request->lastname;
        $pedidoVagaDoutor->carteira_profissional = $request->carteiraProfissional;
        $pedidoVagaDoutor->telefone = $request->telefone;
        $pedidoVagaDoutor->nacionalidade = $request->nacionalidade;
        $pedidoVagaDoutor->email = $request->email;
        $pedidoVagaDoutor->especialidade = $request->especialidade;
        $pedidoVagaDoutor->anos_experiencia = $request->experiencia;
        $pedidoVagaDoutor->endereco = $request->endereco;
        $pedidoVagaDoutor->motivo = $request->motivo;
        $pedidoVagaDoutor->sexo = $request->sexo;


        $pedidoVagaDoutor->url_cv = $request->file('cv')->store('userPhotos');
        $pedidoVagaDoutor->save();

        return redirect()->back()->with(["requestSucess" => true]);
    }

    public function show(Doutores $doutores)
    {
        //
    }

    public function edit(Doutores $doutores)
    {
        //
    }

    public function update(Request $request, Doutores $doutores)
    {
        //
    }

    public function destroy(Doutores $doutores)
    {
        //
    }
}
