<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtém os dados do formulário
  $nome = trim($_POST['nome']);
  $email = trim($_POST['email']);
  $data_nascimento = trim($_POST['data_nascimento']);
  $residencia = trim($_POST['residencia']);
  $preferencias = trim($_POST['preferencias']);

  // Verifica se todos os campos foram preenchidos
  if (empty($nome) || empty($email) || empty($data_nascimento) || empty($residencia) || empty($preferencias)) {
    echo "Por favor, preencha todos os campos obrigatórios.";
  } else {
    $_SESSION['usuario'] = [
      'nome' => $nome,
      'email' => $email,
      'data_nascimento' => $data_nascimento,
      'residencia' => $residencia,
      'preferencias' => $preferencias,
    ];
    header("Location: produtos.php");
    exit();
  }
} else {
  echo "Formulário não enviado corretamente.";
}
?>
<footer>
  <p>&copy; 2024 Saborela - Todos os direitos reservados</p>
</footer>