<!DOCTYPE html>
<html>
<head>
  <title>Novo Livro</title>
</head>
<body>
  <h1>Novo Livro</h1>
  <form method="post" action="novo_livro_confirmacao.php">
    <label>Título:</label>
    <input type="text" name="titulo" required>
    <br>
    <label>Autor:</label>
    <input type="text" name="autor" required>
    <br>
    <label>Editora:</label>
    <input type="text" name="editora" required>
    <br>
    <label>Ano:</label>
    <input type="date" name="ano" required>
    <br>
    <label>Status:</label>
    <input type="number" name="status" required>
    <br>
    <input type="submit" value="Salvar">
  </form>
  <p><a href="index.php">Voltar à página inicial</a></p>
</body>
</html>
