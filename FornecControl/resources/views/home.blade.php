@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Listagem de Fornecedores:</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <form method="get" action="{{ route('home') }}">
                        <div class="form-group">
                            <label for="empresa_id">Filtrar por empresa:</label>
                            <select class="form-control" id="empresa_id" name="empresa_id">
                                <option value="">Todas as empresas</option>
                                @foreach($empresas as $empresa)
                                    <option value="{{ $empresa->id }}" {{ $empresa->id == $selectedEmpresaId ? 'selected' : '' }}>
                                        {{ $empresa->nome_fantasia }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                    </form>
                    


                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CPF/CNPJ</th>
                                <th>Data de Cadastro</th>
                                <th>Telefones</th>
                                <th>Empresa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fornecedores as $fornecedor)
                                <tr>
                                    <td>{{ $fornecedor->nome }}</td>
                                    <td>{{ $fornecedor->cpf_cnpj }}</td>
                                    <td>{{ $fornecedor->data_cadastro }}</td>
                                    <td>{{ $fornecedor->telefones }}</td>
                                    <td>{{ $fornecedor->empresa_id }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
