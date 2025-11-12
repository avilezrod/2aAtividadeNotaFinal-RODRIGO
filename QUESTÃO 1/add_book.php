<?php
include 'database.php';

$titulo = trim($_POST['titulo'] ?? '');
$autor = trim($_POST['autor'] ?? '');
$ano_pub = intval($_POST['ano_pub'] ?? 0);


if ($titulo === '' || $autor === '' || $ano_pub === 0) {
    echo "Erro: Preencha todos os campos corretamente.";
    exit;
}

$stmt = $db->prepare('INSERT INTO livros (titulo, autor, ano_pub) VALUES (:titulo, :autor, :ano_pub)');
$stmt->bindValue(':titulo', $titulo, SQLITE3_TEXT);
$stmt->bindValue(':autor', $autor, SQLITE3_TEXT);
$stmt->bindValue(':ano_pub', $ano_pub, SQLITE3_INTEGER);
$result = $stmt->execute();
if ($result) {
    header('Location: index.php');
    exit;
} else {
    echo "Erro ao adicionar livro.";
}
?>
