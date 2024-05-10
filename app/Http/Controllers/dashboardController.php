<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{

    public function index()
    {
        if (null !== Session('loginSession')) {
             if (Session('loginSession')['tipoUsuario'] === 'admin') {
                 return view('admin.dashboard');
            }else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }


    public function getPaginasUsuarios(){
        return redirect()->back();
    }

    public function getPaginasEspecialidades(){
        dd('getPaginasEspecialidades');
    }

    public function getPaginasColaboradores(){
        dd('getPaginasColaboradores');
    }
    public function getAnalisesConsultas(){
        dd('getAnalisesConsultas');
    }

    public function getAnalisesPacientes(){
        dd('getAnalisesPacientes');
    }

    public function getAnalisesFinanceiro(){
        dd('getAnalisesFinanceiro');
    }
    public function getUsuarioSettings(){
        dd('getUsuarioSettings');
    }

    public function getUsuarioHelp(){
        dd('getUsuarioHelp');
    }


}
