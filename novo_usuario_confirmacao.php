<?php
require_once('conexao.php');
$nome = $_POST['nome'];
$email = $_POST['email'];
$sql = "INSERT INTO Usuarios (nome, email) VALUES ('$nome', '$email')";
if ($conexao->query($sql) === TRUE) {
  header('Location: lista_usuarios.php');
} else {
  echo "Erro ao adicionar usuário: " . $conexao->error;
}
$conexao->close();
?>
