<?php
require_once('conexao.php');
$sql = "SELECT * FROM Usuarios";
$resultado = $conexao->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Lista de Usuários</title>
</head>
<body>
  <h1>Lista de Usuários</h1>
  <?php if ($resultado->num_rows > 0) { ?>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>E-mail</th>
      </tr>
    </thead>
    <tbody>
      <?php while($usuario = $resultado->fetch_assoc()) { ?>
      <tr>
        <td><?php echo $usuario['id'] ?></td>
        <td><?php echo $usuario['nome'] ?></td>
        <td><?php echo $usuario['email'] ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php } else { ?>
  <p>Não há usuários cadastrados.</p>
  <?php } ?>
  <p><a href="index.php">Voltar à página inicial</a></p>
</body>
</html>
