<?php
include 'database.php';
$todas = $db->query("SELECT * FROM tarefas ORDER BY concluida, data_vencimento");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Gerenciador de Tarefas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Adicionar Nova Tarefa</h2>
    <form method="POST" action="add_tarefa.php">
        Descrição: <input type="text" name="descricao" required>
        Data de vencimento: <input type="date" name="data_vencimento" required>
        <button type="submit">Adicionar</button>
    </form>

    <h2>Tarefas</h2>
    <ul>
    <?php while ($tarefa = $todas->fetchArray(SQLITE3_ASSOC)) { ?>
        <li>
            <?php if ($tarefa['concluida']) echo '<s>'; ?>
            <?= htmlspecialchars($tarefa['descricao']) ?> (até <?= htmlspecialchars($tarefa['data_vencimento']) ?>)
            <?php if ($tarefa['concluida']) echo '</s>'; ?>
            <div>
            <?php if (!$tarefa['concluida']) { ?>
                <a href="update_tarefa.php?id=<?= $tarefa['id'] ?>">Concluir</a>
            <?php } ?>
                <a href="delete_tarefa.php?id=<?= $tarefa['id'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
            </div>
        </li>
    <?php } ?>
    </ul>
</body>
</html>
