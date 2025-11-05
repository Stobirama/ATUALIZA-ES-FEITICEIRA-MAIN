<?php
session_start();
if (!isset($_SESSION['logado'])) { header("Location: index.html"); exit; }

$texto = trim($_POST['texto']);
if ($texto === "") { exit("Vazio"); }

$updates = file_exists("updates.json") ? json_decode(file_get_contents("updates.json"), true) : [];
$updates[] = $texto;

file_put_contents("updates.json", json_encode($updates, JSON_PRETTY_PRINT));
file_put_contents("update.txt", $texto); // última atualização vira a API

header("Location: dashboard.php");
?>