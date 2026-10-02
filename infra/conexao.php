<?php

$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "gestao_brinquedos";

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

$conexao->set_charset("utf8mb4");

?>