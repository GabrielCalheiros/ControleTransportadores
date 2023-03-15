# FornecControl
## Descrição
FornecControl é um sistema que utiliza o framework Laravel juntamente com a interface do usuário AdminLTE para criar um sistema simples de rastreamento de Fornecedores e Empresas. O menu principal inclui as opções para adicionar uma nova Empresa, adicionar um novo Fornecedor e acessar uma página de dashboard onde a lista de Fornecedores para uma Empresa específica é exibida.

## Tabela Técnica
> Framework: Laravel+Admin AdminLTE

## Instalação
Para instalar este sistema, siga estas etapas:

*Baixe o sistema do GitHub.
*Instale as dependências executando o seguinte comando: composer install
*Crie um novo banco de dados.
*Renomeie o arquivo .env.example para .env e defina as credenciais do banco de dados.
*Execute o seguinte comando para gerar uma chave de aplicativo: php artisan key:generate
*Execute as migrações e semeie o banco de dados executando o seguinte comando: php artisan migrate --seed
*Inicie o servidor executando o seguinte comando: php artisan serve
*Acesse o sistema em seu navegador em http://localhost:8000
*Teste de Login
*Para testar o sistema sem criar uma conta, utilize as seguintes credenciais de login:

## Usuário para Testes
*Usuário: adminTeste
*E-mail: teste@teste.com
*Senha: 12345678
