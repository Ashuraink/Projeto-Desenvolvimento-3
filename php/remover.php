<?php
include_once('conexao.php');

// Verifica se o ID foi passado via GET
if (isset($_GET['id'])) {
  $id = intval($_GET['id']);  // Sanitiza o ID

  // Marca o produto como inativo
  $sql = "UPDATE produtos SET ativo = 0 WHERE id = $id";

  if (mysqli_query($conn, $sql)) {
    $mensagem = "<p class='sucesso'>Produto removido com sucesso.</p>";
  } else {
    $mensagem = "<p class='erro'>Erro ao remover o produto: " . mysqli_error($conn) . "</p>";
  }
} else {
  $mensagem = "<p class='erro'>ID de produto inválido.</p>";
}

// Redireciona de volta para a lista de produtos
header("Location: produtos.php");
exit();

mysqli_close($conn);
?>
<footer>
  <p>&copy; 2024 Saborela - Todos os direitos reservados</p>
</footer>