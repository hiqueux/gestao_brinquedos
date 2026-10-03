<?php

include "../infra/conexao.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
if (!$id) {
    die("ID do brinquedo inválido.");
}

$sql = "SELECT * FROM brinquedos WHERE id = ?";
$stmt = $conexao->prepare($sql);

if (!$stmt) {
    die("Erro ao preparar consulta.");
}

$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 0) {
    die("Brinquedo não encontrado.");
}

$brinquedo = $resultado->fetch_assoc();
$stmt->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Brinquedo</title>
    <link rel="stylesheet" href="../style/styles.css">
</head>

<body>
<header>
    <h1>CRUD - Gestão de Brinquedos</h1>
</header>

<main>
    <h2> Editando o brinquedo <?php echo htmlspecialchars($brinquedo["nome"]); ?>! </h2>

    <form action="atualizar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $brinquedo["id"]; ?>">

        <label for="nome"> Nome: </label>
        <input type="text" name="nome" value="<?php echo htmlspecialchars($brinquedo["nome"]); ?>" required>

        <label for="categoria"> Categoria: </label>
        <input type="text" name="categoria" value="<?php echo htmlspecialchars($brinquedo["categoria"]); ?>" required>

        <label for="faixa_etaria"> Faixa etária: </label>
        <input type="text" name="faixa_etaria" value="<?php echo htmlspecialchars($brinquedo["faixa_etaria"]); ?>" required>

        <label for="preco"> Preço: </label>
        <input type="number" name="preco" step="0.01" min="0" value="<?php echo $brinquedo["preco"]; ?>" required>

        <label for="quantidade_estoque"> Quantidade em estoque: </label>
        <input type="number" name="quantidade_estoque" min="0" value="<?php echo $brinquedo["quantidade_estoque"]; ?>" required>

        <button type="submit"> Atualizar </button>
    </form>

</main>
</body>

</html>