<?php
session_start();
if (!isset($_SESSION['logado'])) { header("Location: index.html"); exit; }

$id = $_POST['id'];
$updates = json_decode(file_get_contents("updates.json"), true);

unset($updates[$id]);
$updates = array_values($updates);

file_put_contents("updates.json", json_encode($updates, JSON_PRETTY_PRINT));

// Atualiza API com o último item ou vazio
file_put_contents("update.txt", end($updates) ?: "");

header("Location: dashboard.php");