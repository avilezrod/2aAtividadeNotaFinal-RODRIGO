<?php
include 'database.php';

$result = $db->query('SELECT * FROM livros');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Livraria - Cadastro de Livros</title>
</head>
<body>
    <h2>Livros Cadastrados</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Ano</th>
            <th>Remover</th>
        </tr>
        <?php while ($row = $result->fetchArray()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['titulo']); ?></td>
                <td><?php echo htmlspecialchars($row['autor']); ?></td>
                <td><?php echo $row['ano_pub']; ?></td>
                <td>
                    <form action="delete_book.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
    <h2>Cadastrar Novo Livro</h2>
    <form action="add_book.php" method="post">
        <label>Título:</label>
        <input type="text" name="titulo" required><br>
        <label>Autor:</label>
        <input type="text" name="autor" required><br>
        <label>Ano:</label>
        <input type="number" name="ano_pub" required><br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
