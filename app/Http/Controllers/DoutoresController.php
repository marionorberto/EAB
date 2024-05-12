<?php

namespace App\Http\Controllers;

use App\Models\Doutores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoutoresController extends Controller
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
        return view('doutor.store');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validator = Validator::make(
            $request->all(),
            [
                'firstname' => 'required|min:3|max:30',
                'lastname' => 'required|min:3|max:30',
                'telefone' => 'required|min:9|max:15',
                'idade' => 'required|min:0|max:90',
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
                'idade.required' => 'Idade é um campo requerido.',
                'idade.min' => 'idade deve estar entre 0 à 90 anos.',
                'idade.max' => 'idade deve estar entre 0 à 90 anos.',
                'motivo.required' => 'Motivo da consulta é campo requerido.',
                'motivo.min' => 'Motivo da consulta deve ter no mínimo 10 caracteres.',
            ]
         );
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Doutores $doutores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doutores $doutores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doutores $doutores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doutores $doutores)
    {
        //
    }
}
