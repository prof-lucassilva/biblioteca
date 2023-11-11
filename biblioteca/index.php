<!DOCTYPE html>
<html>
<head>
    <title>Estoque de Livros</title>
</head>
<body>
    <h1>Estoque de Livros</h1>

    <?php
    // Inclua o arquivo de conexão
    include('conexao.php');

    // Consulta SQL para buscar os dados da tabela
    $sql = "SELECT id_livro, titulo_livro, autor_livro, genero_livro, qtd_livro FROM biblio_estoque";

    // Executa a consulta
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Título</th><th>Autor</th><th>Gênero</th><th>Quantidade</th></tr>";

        // Loop através dos resultados e exibe cada linha na tabela
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id_livro'] . "</td>";
            echo "<td>" . $row['titulo_livro'] . "</td>";
            echo "<td>" . $row['autor_livro'] . "</td>";
            echo "<td>" . $row['genero_livro'] . "</td>";
            echo "<td>" . $row['qtd_livro'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Nenhum dado encontrado na tabela.";
    }

    // Fecha a conexão com o banco de dados
    $conexao->close();
    ?>

</body>
</html>
