<?php
include_once('conexao.php');

// Consulta para buscar apenas produtos inativos (ativo = 0)
$sql = "SELECT id, nome FROM produtos WHERE ativo = 0";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restaurar Produtos</title>
  <link rel="stylesheet" href="style.css"> <!-- Inclui o arquivo CSS -->
</head>

<body>
  <div class="container">
    <h1>Produtos Removidos</h1>
    <ul>
      <?php
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<li>";
          echo htmlspecialchars($row['nome']);
          echo " <a class='btn' href='restaurar_produto.php?id=" . $row['id'] . "'>Restaurar</a>";
          echo "</li>";
        }
      } else {
        echo "<li>Nenhum produto para restaurar.</li>";
      }
      ?>
    </ul>
    <footer>
      <p><a href="produtos.php">Voltar à Lista de Produtos</a></p>
    </footer>
  </div>
</body>

</html>
<?php
mysqli_close($conn);
?>
<footer>
  <p>&copy; 2024 Saborela - Todos os direitos reservados</p>
</footer>