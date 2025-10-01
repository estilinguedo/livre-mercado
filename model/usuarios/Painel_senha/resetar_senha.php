<?php
session_start();
require_once "../../../factory/conexao.php";

$mensagem_usuario = '';
$token = $_GET['token'] ?? '';

if (empty($token)) {
    die("Token inválido.");
}

try {
    $db = new Caminho();
    $conn = $db->getConn();

    $stmt = $conn->prepare("SELECT * FROM recuperacoes_senha 
                            WHERE token = :token AND usado = 0 AND data_expiracao > NOW()");
    $stmt->execute([':token' => $token]);
    $recuperacao = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$recuperacao) {
        die("Link inválido ou expirado.");
    }

    $_SESSION['id_usuario_reset'] = $recuperacao['id_usuario'];
    $_SESSION['token_reset'] = $token;

} catch (PDOException $e) {
    die("Erro no servidor: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Redefinir Senha</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Redefinir Senha</h1>

    <?php if (!empty($mensagem_usuario)): ?>
        <p style="color:red;"><?= htmlspecialchars($mensagem_usuario) ?></p>
    <?php endif; ?>

    <form method="POST" action="redefinir_senha.php">
        <label for="senha">Nova Senha:</label><br>
        <input type="password" id="senha" name="senha" required><br><br>

        <label for="confirmar">Confirmar Senha:</label><br>
        <input type="password" id="confirmar" name="confirmar" required><br><br>

        <button type="submit">Alterar Senha</button>
    </form>
</body>
</html>
