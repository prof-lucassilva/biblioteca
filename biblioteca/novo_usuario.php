<!DOCTYPE html>
<html>
<head>
  <title>Novo Usuário</title>
</head>
<body>
  <h1>Novo Usuário</h1>
  <form method="post" action="novo_usuario_confirmacao.php">
    <label>Nome:</label>
    <input type="text" name="nome" required>
    <br>
    <label>E-mail:</label>
    <input type="email" name="email" required>
    <br>
    <input type="submit" value="Salvar">
  </form>
  <p><a href="index.php">Voltar à página inicial</a></p>
</body>
</html>
