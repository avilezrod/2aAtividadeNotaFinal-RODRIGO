<?php
include 'database.php';
if (!empty($_GET['id'])) {
    $id = intval($_GET['id']);
    $db->exec("UPDATE tarefas SET concluida = 1 WHERE id = $id");
}
header('Location: index.php');
exit;
?>
