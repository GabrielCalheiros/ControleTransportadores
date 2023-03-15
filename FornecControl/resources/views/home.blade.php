@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Listagem</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">Você está logado!</p>
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
