@extends('adminlte::page')

@section('title', 'Cadastrar Fornecedor') <!-- Sets the page title -->

@section('content_header')
<h1>Cadastrar Fornecedor</h1> <!-- Header title of the page -->
@stop

@section('content')
@if(session('success')) <!-- If a success message exists in the session, display it -->
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif
<form action="{{ route('fornecedores.store') }}" method="POST"> <!-- Form to create a new supplier, using the 'store' method from the 'FornecedoresController' -->
    @csrf <!-- CSRF protection token -->

    <!-- Input field for the supplier's name -->
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
    </div>

    <!-- Input field for the supplier's CPF/CNPJ -->
    <div class="form-group">
        <label for="cpf_cnpj">CPF/CNPJ</label>
        <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" maxlength="20" required>
    </div>

    <!-- Input field for the supplier's registration date -->
    <div class="form-group">
        <label for="data_cadastro">Data de Cadastro</label>
        <input type="date" class="form-control" id="data_cadastro" name="data_cadastro" required>
    </div>

    <!-- Input field for the supplier's telephone numbers -->
    <div class="form-group">
        <label for="telefones">Telefones</label>
        <input type="text" class="form-control" id="telefones" name="telefones">
    </div>

    <!-- Dropdown menu to select the supplier's company -->
    <div class="form-group">
        <label for="empresa_id">Empresa</label>
        <select class="form-control" id="empresa_id" name="empresa_id" required>
            <option value="" disabled selected>Selecione uma empresa</option>
            @foreach($empresas as $empresa) <!-- Loop through each company and display it as an option -->
                <option value="{{ $empresa->id }}">{{ $empresa->nome_fantasia }}</option>
            @endforeach
        </select>
    </div>

    <!-- Submit button to create the new supplier -->
    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
@stop <!-- End of the page content -->



