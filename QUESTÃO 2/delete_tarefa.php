<?php
include 'database.php';
if (!empty($_GET['id'])) {
    $id = intval($_GET['id']);
    $db->exec("DELETE FROM tarefas WHERE id = $id");
}
header('Location: index.php');
exit;
?>
