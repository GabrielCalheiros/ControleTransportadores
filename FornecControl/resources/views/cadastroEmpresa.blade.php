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
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep" maxlength="8" onblur="pesquisacep(this.value);" required>
                </div>
                <div class="form-group">
                    <label for="rua">Rua</label>
                    <input type="text" class="form-control" id="rua" name="rua" required>
                </div>
                <div class="form-group">
                    <label for="numero">Número</label>
                    <input type="text" class="form-control" id="numero" name="numero" required>
                </div>
                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" required>
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" required>
                </div>
                <div class="form-group">
                    <label for="uf">Estado</label>
                    <input type="text" class="form-control" id="uf" name="uf" maxlength="2" required>
                </div>
                <div class="form-group">
                    <label for="ibge">IBGE</label>
                    <input type="text" class="form-control" id="ibge" name="ibge" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" readonly required>
                </div>
                <div class="form-group">
                    <label for="nome_fantasia">Nome Fantasia</label>
                    <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia" required>
                </div>
                <div class="form-group">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" class="form-control" id="cnpj" name="cnpj" maxlength="14" required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>


        <!-- Adicionando Javascript -->
        <script>
            // This function is called when the CEP input field loses focus
            function pesquisacep(valor) {
                // Removes all non-digit characters from the input value
                var cep = valor.replace(/\D/g, '');
        
                // If the input value is not empty
                if (cep != "") {
                    // Regular expression that matches a string of exactly 8 digits
                    var validacep = /^[0-9]{8}$/;
        
                    // If the input value matches the regular expression
                    if(validacep.test(cep)) {
                        // Clears the address fields
                        document.getElementById('rua').value="";
                        document.getElementById('bairro').value="";
                        document.getElementById('cidade').value="";
                        document.getElementById('uf').value="";
                        document.getElementById('ibge').value="";
        
                        // Creates a new script element
                        var script = document.createElement('script');
        
                        // Sets the script's source attribute to a URL that returns a JSON object with address information for the given CEP value
                        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=preencherEndereco';
        
                        // Appends the script element to the HTML document's body
                        document.body.appendChild(script);
                    } else {
                        // If the input value doesn't match the regular expression, clears the address fields and shows an alert message
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } else {
                    // If the input value is empty, clears the address fields
                    limpa_formulário_cep();
                }
            }
        
            // This function is called when the script added in pesquisacep function returns a response with address information
            function preencherEndereco(conteudo) {
                // If the JSON object returned from the API doesn't have an "erro" property
                if (!("erro" in conteudo)) {
                    // Sets the value of the address fields to the corresponding properties in the JSON object
                    document.getElementById('rua').value=(conteudo.logradouro);
                    document.getElementById('bairro').value=(conteudo.bairro);
                    document.getElementById('cidade').value=(conteudo.localidade);
                    document.getElementById('uf').value=(conteudo.uf);
                    document.getElementById('ibge').value=(conteudo.ibge);
        
                    // Sets the value of the "endereco" field to the concatenated values of the address fields
                    document.getElementById('endereco').value=(conteudo.logradouro + ', ' + conteudo.bairro + ', ' + conteudo.localidade + ', ' + conteudo.uf);
                } else {
                    // If the JSON object returned from the API has an "erro" property, clears the address fields and shows an alert message
                    limpa_formulário_cep();
                    alert("CEP não encontrado.");
                }
            }
        
            // This function clears the address fields
            function limpa_formulário_cep() {
                document.getElementById('rua').value="";
                document.getElementById('bairro').value="";
                document.getElementById('cidade').value="";
                document.getElementById('uf').value="";
                document.getElementById('ibge').value="";
            }
        </script>
        


@stop