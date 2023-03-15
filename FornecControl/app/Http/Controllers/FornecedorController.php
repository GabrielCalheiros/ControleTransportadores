<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;
use App\Models\Empresa;

class FornecedorController extends Controller
{
    // Function to show a list of all Fornecedores

    // Function to show the form to create a new Fornecedor
    public function create()
    {
        // Get all Empresas from the database to populate the Empresa dropdown in the form
        $empresas = Empresa::all();

        // Return the view with the form to create a new Fornecedor
        return view('cadastroFornecedor', compact('empresas'));
    }

    // Function to store the new Fornecedor in the database

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'nome' => 'required|max:255',
            'cpf_cnpj' => 'required|unique:fornecedores|max:20',
            'data_cadastro' => 'required|date',
            'telefones' => 'nullable|json',
            'empresa_id' => 'required|exists:empresas,id',
        ]);
    
        // Create a new Fornecedor object and set its properties
        $fornecedor = new Fornecedor;
        $fornecedor->nome = $request->nome;
        $fornecedor->cpf_cnpj = $request->cpf_cnpj;
        $fornecedor->data_cadastro = $request->data_cadastro;
        $fornecedor->telefones = $request->telefones;
        $fornecedor->empresa_id = $request->empresa_id;
    
        // Save the new Fornecedor to the database
        $fornecedor->save();
    
        // Flash a success message to the session
        session()->flash('success', 'Fornecedor adicionado com sucesso!');
    
        // Redirect back to the list of Fornecedores
        return redirect()->back()->with('success', 'Fornecedor adicionado com sucesso!');
    }

    public function index()
{
    $fornecedores = Fornecedor::all();
    return view('home', compact('fornecedores'));
    
}

    
}
