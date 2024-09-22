<?php
include_once('conexao.php');

// Consulta para buscar apenas produtos ativos
$sql = "SELECT id, nome, preco FROM produtos WHERE ativo = 1";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="style.css"> <!-- Link para o CSS -->
</head>

<body>
    <div class="container">
        <h1>Lista de Produtos</h1>
        <ul>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<li>";
                    echo htmlspecialchars($row['nome']) . " - R$ " . number_format($row['preco'], 2, ',', '.');
                    echo " <a class='btn' href='detalhe_produto.php?id=" . $row['id'] . "'>Ver detalhes</a>";
                    echo " <a class='btn' href='remover.php?id=" . $row['id'] . "'>Remover</a>";
                    echo "</li>";
                }
            } else {
                echo "<li>Nenhum produto encontrado.</li>";
            }
            ?>
        </ul>
        <footer>
            <p><a href="restaurar.php">Restaurar Produtos</a></p> <!-- Link para restaurar -->
        </footer>
    </div>
</body>

</html>
<?php
mysqli_close($conn);
?>