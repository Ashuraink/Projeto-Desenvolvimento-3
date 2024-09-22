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
    $preco = $row['preco'];
  } else {
    echo "<p class='erro'>Produto não encontrado ou foi removido.</p>";
  }
} else {
  echo "<p class='erro'>ID de produto inválido.</p>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Atualiza os dados do produto
  $nome = mysqli_real_escape_string($conn, $_POST['nome']);
  $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
  $preco = floatval($_POST['preco']);

  $sql = "UPDATE produtos SET nome='$nome', descricao='$descricao', preco='$preco' WHERE id=$id";

  if (mysqli_query($conn, $sql)) {
    echo "<p class='sucesso'>Produto atualizado com sucesso.</p>";
  } else {
    echo "<p class='erro'>Erro ao atualizar o produto: " . mysqli_error($conn) . "</p>";
  }
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alterar Produto</title>
  <link rel="stylesheet" href="style.css"> <!-- Inclui o arquivo CSS -->
</head>

<body>
  <div class="container">
    <h1>Alterar Produto</h1>
    <form method="POST">
      <label for="nome">Nome do Produto:</label>
      <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" required>

      <label for="descricao">Descrição:</label>
      <textarea id="descricao" name="descricao" required><?php echo $descricao; ?></textarea>

      <label for="preco">Preço:</label>
      <input type="number" step="0.01" id="preco" name="preco" value="<?php echo $preco; ?>" required>

      <input type="submit" value="Atualizar Produto">
    </form>
    <footer>
      <p><a href="produtos.php">Voltar à Lista de Produtos</a></p>
    </footer>
  </div>
</body>

</html>