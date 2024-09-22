<?php
include_once('conexao.php');

// Verifica se o ID foi passado via GET
if (isset($_GET['id'])) {
  $id = intval($_GET['id']);  // Sanitiza o ID

  // Consulta para buscar detalhes do produto
  $sql = "SELECT * FROM produtos WHERE id = $id AND ativo = 1";
  $result = mysqli_query($conn, $sql);

  if ($row = mysqli_fetch_assoc($result)) {
    $nome = htmlspecialchars($row['nome']);
    $descricao = htmlspecialchars($row['descricao']);
    $preco = number_format($row['preco'], 2, ',', '.');
  } else {
    echo "<p class='erro'>Produto não encontrado ou foi removido.</p>";
  }
} else {
  echo "<p class='erro'>ID de produto inválido.</p>";
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalhes do Produto</title>
  <link rel="stylesheet" href="style.css"> <!-- Inclui o arquivo CSS -->
</head>

<body>
  <div class="container">
    <h1>Detalhes do Produto</h1>
    <?php if (isset($nome)): ?>
      <p><strong>Nome:</strong> <?php echo $nome; ?></p>
      <p><strong>Descrição:</strong> <?php echo $descricao; ?></p>
      <p><strong>Preço:</strong> R$ <?php echo $preco; ?></p> <!-- Exibe o preço -->
    <?php endif; ?>
    <footer>
      <p><a href="produtos.php">Voltar à Lista de Produtos</a></p>
    </footer>
  </div>
</body>

</html>