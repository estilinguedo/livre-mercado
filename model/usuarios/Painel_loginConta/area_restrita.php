<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit;
}
?>
<h2>Bem-vindo, <?= htmlspecialchars($_SESSION['nome']) ?>!</h2>
<p>Você está logado como <?= htmlspecialchars($_SESSION['tipo']) ?>.</p>
<a href="logout.php">Sair</a>
