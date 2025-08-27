<?php
require 'pdo_conexao.php';

$token = $_GET['token'] ?? '';

if (!$token) {
    die('Token inválido.');
}

$stmt = $pdo->prepare("SELECT * FROM recuperacoes_senha WHERE token = ? AND usado = 0 AND data_expiracao > NOW()");
$stmt->execute([$token]);
$recuperacao = $stmt->fetch();

if (!$recuperacao) {
    die('Token expirado ou inválido.');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Redefinição de senha</title>
</head>
<body>
    <h1>Redefinir Senha</h1>
    <form method="POST" action="alterar_senha.php">
        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
        <label>Nova senha:</label><br>
        <input type="password" name="senha" required><br><br>
        <button type="submit">Alterar senha</button>
    </form>
</body>
</html>