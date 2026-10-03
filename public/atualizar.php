<?php

include "../infra/conexao.php";

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
$nome = trim($_POST["nome"] ?? "");
$categoria = trim($_POST["categoria"] ?? "");
$faixa_etaria = trim($_POST["faixa_etaria"] ?? "");
$preco = $_POST["preco"] ?? "";
$quantidade_estoque = $_POST["quantidade_estoque"] ?? "";

if (!$id) {
    die("ID do brinquedo inválido.");
}

if ($nome === "" || $categoria === "" || $faixa_etaria === "" || $preco === "" || $quantidade_estoque === "") {
    die("Todos os campos são obrigatórios.");
}

if (!is_numeric($preco) || $preco < 0) {
    die("Preço inválido.");
}

if (
    filter_var($quantidade_estoque, FILTER_VALIDATE_INT) === false ||
    $quantidade_estoque < 0
) {
    die("Quantidade de estoque inválida.");
}

$preco = (float) $preco;
$quantidade_estoque = (int) $quantidade_estoque;
$sql = "UPDATE brinquedos SET nome = ?, categoria = ?, faixa_etaria = ?, preco = ?, quantidade_estoque = ? WHERE id = ?";
$stmt = $conexao->prepare($sql);

if (!$stmt) {
    die("Erro ao preparar atualização.");
}

$stmt->bind_param("sssdii", $nome, $categoria, $faixa_etaria, $preco, $quantidade_estoque, $id);

if (!$stmt->execute()) {
    die("Erro ao atualizar brinquedo.");
}

$stmt->close();
header("Location: ../index.php");
exit;

?>