<?php
// Definição dos parâmetros de conexão
$host = "localhost";
$user = "root";
$pass = "root";  // Caso tenha senha, defina aqui
$dbname = "saborela_2024";

// Criação da conexão
$conn = new mysqli($host, $user, $pass, $dbname);

// Verificação de conexão
if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}
?>
<footer>
  <p>&copy; 2024 Saborela - Todos os direitos reservados</p>
</footer>