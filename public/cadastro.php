<?php

include "../infra/conexao.php";

$nome = trim($_POST["nome"] ?? "");
$categoria = trim($_POST["categoria"] ?? "");
$faixa_etaria = trim($_POST["faixa_etaria"] ?? "");
$preco = $_POST["preco"] ?? "";
$quantidade_estoque = $_POST["quantidade_estoque"] ?? "";

if ($nome === "" || $categoria === "" || $faixa_etaria === "" || $preco === "" || $quantidade_estoque === "") {
    die("Todos os campos são obrigatórios.");
}

if (!is_numeric($preco) || $preco < 0) {
    die("Preço inválido.");
}

if (filter_var($quantidade_estoque, FILTER_VALIDATE_INT) === false ||$quantidade_estoque < 0) {
    die("Quantidade de estoque inválida.");
}

$preco = (float) $preco;
$quantidade_estoque = (int) $quantidade_estoque;
$sql = "INSERT INTO brinquedos (nome, categoria, faixa_etaria, preco, quantidade_estoque) VALUES (?, ?, ?, ?, ?)";

$stmt = $conexao->prepare($sql);

if (!$stmt) {
    die("Erro ao preparar cadastro.");
}

$stmt->bind_param("sssdi", $nome, $categoria, $faixa_etaria, $preco, $quantidade_estoque);

if (!$stmt->execute()) {
    die("Erro ao cadastrar brinquedo.");
}

$stmt->close();
header("Location: ../index.php");
exit;

?>