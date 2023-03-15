<?php

namespace App\Http\Controllers;
use App\Models\Fornecedor;
use App\Models\Empresa;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
{
    $selectedEmpresaId = $request->input('empresa_id');
    $empresas = Empresa::all();
    $fornecedores = Fornecedor::when($selectedEmpresaId, function($query, $selectedEmpresaId) {
        return $query->where('empresa_id', $selectedEmpresaId);
    })->get();
    return view('home', compact('fornecedores', 'empresas', 'selectedEmpresaId'));
}




    
}
