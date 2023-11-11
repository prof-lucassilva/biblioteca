<?php
require_once('conexao.php');

$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$editora = $_POST['editora'];
$ano = $_POST['ano'];
$status = $_POST['status'];

$sql = "INSERT INTO Livros (titulo, autor, editora, ano, status) VALUES ('$titulo', '$autor','$editora','$ano','$status')";
if ($conexao->query($sql) === TRUE) {
  header('Location: lista_livros.php');
} else {
  echo "Erro ao adicionar livro: " . $conexao->error;
}
$conexao->close();
?>
