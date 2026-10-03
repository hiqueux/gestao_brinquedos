<?php

include "../infra/conexao.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if (!$id) {
    die("ID do brinquedo inválido.");
}

$sql = "DELETE FROM brinquedos WHERE id = ?";
$stmt = $conexao->prepare($sql);

if (!$stmt) {
    die("Erro ao preparar exclusão.");
}

$stmt->bind_param("i", $id);

if (!$stmt->execute()) {
    die("Erro ao excluir brinquedo.");
}

$stmt->close();

header("Location: ../index.php");
exit;

?>