@extends('adminlte::page')

@section('title', 'Cadastrar Empresa')

@section('content_header')
    <h1>Cadastrar Empresa</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('empresas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" required>
        </div>
        <div class="form-group">
            <label for="nome_fantasia">Nome Fantasia</label>
            <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia" required>
        </div>
        <div class="form-group">
            <label for="cnpj">CNPJ</label>
            <input type="text" class="form-control" id="cnpj" name="cnpj" maxlength="14" required>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
@stop
