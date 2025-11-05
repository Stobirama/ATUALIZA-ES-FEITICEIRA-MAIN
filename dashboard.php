<?php
session_start();
if (!isset($_SESSION['logado'])) { header("Location: index.html"); exit; }

$updates = file_exists("updates.json") ? json_decode(file_get_contents("updates.json"), true) : [];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Painel do Criador</title>
<style>
body {
    margin:0; padding:20px;
    font-family: Arial;
    background: linear-gradient(135deg, #000814, #001b3a);
    color:white;
}
h1 { text-align:center; color:#00aaff; }
.card {
    background: rgba(0,0,0,0.7);
    border:1px solid #007bff;
    padding:15px; border-radius:8px;
    margin-top:15px; box-shadow:0 0 10px #007bff;
}
button {
    padding:8px 12px; border:none; border-radius:5px; cursor:pointer;
}
.add-btn { background:#007bff; color:white; width:100%; margin-top:10px; }
.del-btn { background:red; color:white; margin-top:10px; }
textarea {
    width:100%; height:120px; margin-top:8px; border-radius:5px; border:none; padding:10px;
}
</style>
</head>
<body>
<h1>📢 Atualizações do Bot</h1>

<form method="POST" action="save.php">
    <textarea name="texto" placeholder="Digite a nova atualização..." required></textarea>
    <button class="add-btn">Salvar Nova Atualização</button>
</form>

<?php foreach(array_reverse($updates) as $id => $texto): ?>
<div class="card">
    <p><?= nl2br($texto) ?></p>
    <form method="POST" action="delete.php">
        <input type="hidden" name="id" value="<?= $id ?>">
        <button class="del-btn">Apagar</button>
    </form>
</div>
<?php endforeach; ?>

</body>
</html>