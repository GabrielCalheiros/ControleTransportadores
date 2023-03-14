<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    // Function to store the new Empresa in the database
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'endereco' => 'required|string|max:255',
            'nome_fantasia' => 'required|string|max:255',
            'cnpj' => 'required|string|unique:empresas,cnpj|max:14',
        ]);

        // Create a new Empresa object and set its properties
        $empresa = new Empresa;
        $empresa->endereco = $validatedData['endereco'];
        $empresa->nome_fantasia = $validatedData['nome_fantasia'];
        $empresa->cnpj = $validatedData['cnpj'];

        // Save the new Empresa to the database
        $empresa->save();

        // Redirect back to the previous page with a success message
        return redirect()->back()->with('success', 'empresa cadastrada com sucesso!');
    }

    // Function to show the form to create a new Empresa
    public function create()
    {
        // Return the view with the form to create a new Empresa
        return view('cadastroEmpresa');
    }
}
