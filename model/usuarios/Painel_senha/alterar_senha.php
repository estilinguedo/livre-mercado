<?php
session_start();
require_once "../../../factory/conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $senha = $_POST['senha'] ?? '';
    $confirmar = $_POST['confirmar'] ?? '';
    $id_usuario = $_SESSION['id_usuario_reset'] ?? null;
    $token = $_SESSION['token_reset'] ?? null;

    if (!$id_usuario || !$token) {
        die("Sessão inválida.");
    }

    if ($senha !== $confirmar) {
        die("As senhas não coincidem.");
    }

    try {
        $db = new Caminho();
        $conn = $db->getConn();

        $hash = password_hash($senha, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("UPDATE usuarios SET senha_hash = :senha WHERE id_usuario = :id_usuario");
        $stmt->execute([
            ':senha' => $hash,
            ':id_usuario' => $id_usuario
        ]);

        $stmt = $conn->prepare("UPDATE recuperacoes_senha SET usado = 1 WHERE token = :token");
        $stmt->execute([':token' => $token]);

        unset($_SESSION['id_usuario_reset'], $_SESSION['token_reset']);

        echo "Senha alterada com sucesso. <a href='login_email_usuario.php'>Fazer login</a>";

    } catch (PDOException $e) {
        die("Erro no servidor: " . $e->getMessage());
    }
} else {
    header("Location: recuperar_senha.php");
    exit;
}
