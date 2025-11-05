<?php
$senha_correta = "IvarSemossos";

if ($_POST['senha'] === $senha_correta) {
    session_start();
    $_SESSION['logado'] = true;
    header("Location: dashboard.php");
} else {
    echo "<script>alert('Senha incorreta!'); window.location.href='index.html';</script>";
}
?>