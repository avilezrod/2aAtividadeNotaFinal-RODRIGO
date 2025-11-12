<?php
include 'database.php';
$id = intval($_POST['id'] ?? 0);
if ($id > 0) {
    $stmt = $db->prepare('DELETE FROM livros WHERE id = :id');
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $stmt->execute();
}
header('Location: index.php');
exit;
?>
