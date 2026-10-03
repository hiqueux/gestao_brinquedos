<?php

require_once "infra/conexao.php";

$sql = "SELECT * FROM brinquedos ORDER BY id DESC";
$stmt = $conexao->prepare($sql);

if (!$stmt) {
    die("Erro ao listar os brinquedos.");
}

$stmt->execute();
$resultado = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Brinquedos</title>
</head>
<body>

    <h1>GESTÃO DE BRINQUEDOS</h1>
    <h2>Cadastrar Brinquedo</h2>

    <form action="public/cadastrar.php" method="POST">

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <br><br>

        <label for="categoria">Categoria:</label>
        <input type="text" id="categoria" name="categoria" required>

        <br><br>

        <label for="faixa_etaria">Faixa etária:</label>
        <input type="text" id="faixa_etaria" name="faixa_etaria" required>

        <br><br>

        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" step="0.01" min="0" required>

        <br><br>

        <label for="quantidade_estoque">Quantidade estoque:</label>
        <input type="number" id="quantidade_estoque" name="quantidade_estoque" min="0" required>

        <br><br>

        <button type="submit">Cadastrar</button>

    </form>

    <h2>Brinquedos Cadastrados</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Faixa etária</th>
            <th>Preço</th>
            <th>Estoque</th>
            <th>Ações</th>
        </tr>

        <?php while ($brinquedo = $resultado->fetch_assoc()) { ?>

            <tr>
                <td><?= $brinquedo["id"] ?></td>

                <td>
                    <?= htmlspecialchars($brinquedo["nome"]) ?>
                </td>

                <td>
                    <?= htmlspecialchars($brinquedo["categoria"]) ?>
                </td>

                <td>
                    <?= htmlspecialchars($brinquedo["faixa_etaria"]) ?>
                </td>

                <td>
                    R$ <?= number_format($brinquedo["preco"], 2, ",", ".") ?>
                </td>

                <td>
                    <?= $brinquedo["quantidade_estoque"] ?>
                </td>

                <td>
                    <a href="public/editar.php?id=<?= $brinquedo["id"] ?>"> Editar </a>
                    <a href="public/excluir.php?id=<?= $brinquedo["id"] ?>"> Excluir </a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>

<?php
$stmt->close();
?>