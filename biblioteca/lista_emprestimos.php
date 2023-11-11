<?php
require_once('conexao.php');
$sql = "SELECT Emprestimos.id, Livros.titulo, Usuarios.nome, Emprestimos.data_emprestimo, Emprestimos.data_devolucao FROM Emprestimos INNER JOIN Livros ON Emprestimos.livro_id = Livros.id INNER JOIN Usuarios ON Emprestimos.usuario_id = Usuarios.id";
$resultado = $conexao->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Lista de Empréstimos</title>
</head>
<body>
  <h1>Lista de Empréstimos</h1>
  <table>
    <tr>
      <th>ID</th>
      <th>Título do Livro</th>
      <th>Nome do Usuário</th>
      <th>Data do Empréstimo</th>
      <th>Data da Devolução</th>
    </tr>
    <?php while($emprestimo = $resultado->fetch_assoc()) { ?>
    <tr>
      <td><?php echo $emprestimo['id']; ?></td>
      <td><?php echo $emprestimo['titulo']; ?></td>
      <td><?php echo $emprestimo['nome']; ?></td>
      <td><?php echo $emprestimo['data_emprestimo']; ?></td>
      <td><?php echo $emprestimo['data_devolucao']; ?></td>
    </tr>
    <?php } ?>
  </table>
</body>
</html>
