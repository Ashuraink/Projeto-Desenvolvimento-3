<?php
include_once('conexao.php');

// Verifica se o ID foi passado via GET
if (isset($_GET['id'])) {
  $id = intval($_GET['id']);  // Sanitiza o ID

  // Marca o produto como ativo novamente
  $sql = "UPDATE produtos SET ativo = 1 WHERE id = $id";

  if (mysqli_query($conn, $sql)) {
    echo "<p>Produto restaurado com sucesso.</p>";
  } else {
    echo "<p>Erro ao restaurar o produto: " . mysqli_error($conn) . "</p>";
  }
} else {
  echo "<p>ID de produto inválido.</p>";
}

// Redireciona de volta para a lista de produtos
header("Location: produtos.php");
exit();

mysqli_close($conn);
?>
<footer>
  <p>&copy; 2024 Saborela - Todos os direitos reservados</p>
</footer>