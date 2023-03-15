@extends('adminlte::page')

@section('title', 'Cadastrar Fornecedor')

@section('content_header')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>
<h1>Cadastrar Fornecedor</h1>
@stop
@section('content')
@if(session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif
<form action="{{ route('fornecedores.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
    </div>
    <div class="form-group">
        <label for="cpf_cnpj">CPF/CNPJ</label>
        <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" maxlength="20" required>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="1" id="is_pessoa_fisica" name="is_pessoa_fisica">
        <label class="form-check-label" for="is_pessoa_fisica">
            Pessoa Física
        </label>
    </div>
    <div id="pessoa_fisica_fields" style="display:none;">
        <div class="form-group">
            <label for="rg">RG</label>
            <input type="text" class="form-control" id="rg" name="rg">
        </div>
        <div class="form-group">
            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
        </div>
    </div>
    <div class="form-group">
        <label for="telefones">Telefones</label>
        <input type="text" class="form-control" id="telefones" name="telefones">
    </div>
    <div class="form-group">
        <label for="empresa_id">Empresa</label>
        <select class="form-control" id="empresa_id" name="empresa_id" required>
            <option value="" disabled selected>Selecione uma empresa</option>
            @foreach($empresas as $empresa)
                <option value="{{ $empresa->id }}">{{ $empresa->nome_fantasia }}</option>
            @endforeach
        </select>
    </div>
    <input type="hidden" id="data_cadastro" name="data_cadastro" value="{{ now() }}">
    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
@stop

@section('js')
<script>
$(document).ready(function() {
    // When the checkbox is clicked, toggle the visibility of the "Pessoa Física" fields
    $('#is_pessoa_fisica').click(function() {
        if($(this).is(':checked')) {
            $('#pessoa_fisica_fields').show();
        } else {
            $('#pessoa_fisica_fields').hide();
        }
    });
});
</script>
@stop