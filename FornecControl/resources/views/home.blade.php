@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Listagem de Fornecedores:</h1> <!-- Header for the page -->
@stop

@section('content')
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
            @if($fornecedor->empresa_id == $selectedEmpresaId || $selectedEmpresaId == '') <!-- Check if the supplier's company matches the selected company in the dropdown or if no company was selected -->
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
