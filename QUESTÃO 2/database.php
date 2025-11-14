<?php

$db = new SQLite3(__DIR__ . '/tarefas.db');

$db->exec("CREATE TABLE IF NOT EXISTS tarefas (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    descricao TEXT NOT NULL,
    data_vencimento TEXT NOT NULL,
    concluida INTEGER DEFAULT 0
)");
?>
