@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')

<h1 class="m-0 text-dark">Listagem de Fornecedores:</h1> <!-- Header for the page -->
@stop
@section('content')
<?php
$selectedEmpresaId = isset($_GET['empresa_id']) ? $_GET['empresa_id'] : '';
$selectedNome = isset($_GET['nome']) ? $_GET['nome'] : '';
$selectedCpfCnpj = isset($_GET['cpf_cnpj']) ? $_GET['cpf_cnpj'] : '';
$selectedDataCadastro = isset($_GET['data_cadastro']) ? $_GET['data_cadastro'] : '';
?>
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<form method="get" action="{{ route('home') }}"> <!-- Form to select a company to filter the suppliers -->
<div class="input-group mb-3">
<select class="form-control" id="empresa_id" name="empresa_id">
<option value="">Todas as empresas</option> <!-- Option to select all companies -->
@foreach($empresas as $empresa) <!-- Loop through each company to create a dropdown option -->
<option value="{{ $empresa->id }}" {{ $empresa->id == $selectedEmpresaId ? 'selected' : '' }}>
{{ $empresa->nome_fantasia }}
</option>
@endforeach
</select>
<div class="input-group-append">
<button type="submit" class="btn btn-primary">Filtrar</button> <!-- Submit button for the form -->
</div>
</div>
</form>
<form method="get" action="{{ route('home') }}"> <!-- Form to filter suppliers by Name, CPF/CNPJ, and registration date -->
<div class="input-group mb-3">

<input type="text" class="form-control" placeholder="Nome" id="nome" name="nome" value="{{ $selectedNome }}">
<input type="text" class="form-control" placeholder="CPF/CNPJ" id="cpf_cnpj" name="cpf_cnpj" value="{{ $selectedCpfCnpj }}">
<input type="text" class="form-control" placeholder="Data de Cadastro" id="data_cadastro" name="data_cadastro" value="{{ $selectedDataCadastro }}">
<div class="input-group-append">
<button type="submit" class="btn btn-primary">Buscar</button> <!-- Submit button for the form -->
</div>
</div>
</form>
<table class="table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>CPF/CNPJ</th>
            <th>Data de Cadastro</th>
            <th>Telefones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($fornecedores as $fornecedor) <!-- Loop through each supplier to display in the table -->
            @if(($fornecedor->empresa_id == $selectedEmpresaId || $selectedEmpresaId == '') && (strpos(strtolower($fornecedor->nome), strtolower($selectedNome)) !== false) && (strpos($fornecedor->cpf_cnpj, $selectedCpfCnpj) !== false) && (strpos($fornecedor->data_cadastro, $selectedDataCadastro) !== false)) <!-- Check if the supplier's company matches the selected company in the dropdown or if no company was selected, and if the supplier matches the selected filters -->
                <tr>
                    <td>{{ $fornecedor->nome }}</td>
                    <td>{{ $fornecedor->cpf_cnpj }}</td>
                    <td>{{ $fornecedor->data_cadastro }}</td>
                    <td>{{ $fornecedor->telefones }}</td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
</div>
</div>
</div>
</div>
@stop
