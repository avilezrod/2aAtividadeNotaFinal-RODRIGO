<?php
include 'database.php';
if (!empty($_POST['descricao']) && !empty($_POST['data_vencimento'])) {
    $desc = SQLite3::escapeString($_POST['descricao']);
    $data = SQLite3::escapeString($_POST['data_vencimento']);
    $db->exec("INSERT INTO tarefas (descricao, data_vencimento) VALUES ('$desc', '$data')");
}
header('Location: index.php');
exit;
?>
