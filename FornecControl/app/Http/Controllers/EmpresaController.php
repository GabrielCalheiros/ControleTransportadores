<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\empresa;

class EmpresaController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'endereco' => 'required|string|max:255',
            'nome_fantasia' => 'required|string|max:255',
            'cnpj' => 'required|string|unique:empresas,cnpj|max:14',
        ]);

        $empresa = new Empresa;
        $empresa->endereco = $validatedData['endereco'];
        $empresa->nome_fantasia = $validatedData['nome_fantasia'];
        $empresa->cnpj = $validatedData['cnpj'];
        $empresa->save();

        return redirect()->back()->with('success', 'empresa cadastrada com sucesso!');
    }

    public function create()
{
    return view('cadastroEmpresa');
}
}
