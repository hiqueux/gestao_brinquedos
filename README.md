# Sistema de Gestão de Brinquedos

## Objetivo

O Sistema de Gestão de Brinquedos foi desenvolvido para facilitar o controle dos brinquedos de uma loja. Com ele, é possível cadastrar, visualizar, editar e excluir brinquedos, mantendo as informações organizadas no banco de dados. Cada brinquedo possui informações como nome, categoria, faixa etária, preço e quantidade disponível em estoque.

## Tecnologias

Para garantir seu funcionamento, o projeto foi utiliza:

- PHP
- MySQL
- HTML
- XAMPP
- Visual Studio Code
- Git e GitHub

Para as operações realizadas no banco de dados, foram utilizados Prepared Statements, evitando a inserção direta de valores nas consultas SQL.

## Requisitos

Para executar o projeto, é necessário ter:

- PHP
- MySQL
- XAMPP
- Visual Studio Code

## Instalação e configuração

1. Primeiramente, coloque a pasta do projeto dentro da pasta `htdocs` do XAMPP.

2. Depois, abra o XAMPP e inicie o **Apache** e o **MySQL**.

3. Acesse o **phpMyAdmin** pelo botão **Admin** do MySQL e execute o arquivo: `database/db.sql` (Esse arquivo é responsável por criar o banco de dados e a tabela utilizada pelo sistema).

4. Depois, verifique o arquivo: `infra/conexao.php`. Nele estão as informações utilizadas para conectar o sistema ao banco de dados MySQL. Caso seja necessário, os dados de conexão podem ser alterados.

5. Com o Apache e o MySQL funcionando, abra o navegador e acesse: `http://localhost/gestao_brinquedos/`

## Funcionalidades

O sistema possui as seguintes funcionalidades:

- Cadastro de brinquedos;
- Exclusão de brinquedos;
- Tratamento básico de erros.
- Validação dos dados recebidos;
- Edição dos dados dos brinquedos;
- Visualização dos brinquedos cadastrados;
- Uso de Prepared Statements nas operações com o banco de dados;
