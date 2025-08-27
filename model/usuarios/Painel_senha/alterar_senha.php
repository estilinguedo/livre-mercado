<?php
require 'pdo_conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (!$token || !$senha) {
        die('Dados incompletos.');
    }

    $stmt = $pdo->prepare("SELECT * FROM recuperacoes_senha WHERE token = ? AND usado = 0 AND data_expiracao > NOW()");
    $stmt->execute([$token]);
    $recuperacao = $stmt->fetch();

    if (!$recuperacao) {
        die('Token expirado ou inválido.');
    }

    $id_usuario = $recuperacao['id_usuario'];
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Atualiza a senha do usuário
    $stmt = $pdo->prepare("UPDATE usuarios SET senha_hash = ? WHERE id_usuario = ?");
    $stmt->execute([$senha_hash, $id_usuario]);

    // Marca token como usado
    $stmt = $pdo->prepare("UPDATE recuperacoes_senha SET usado = 1 WHERE id_recuperacao = ?");
    $stmt->execute([$recuperacao['id_recuperacao']]);

    echo "Senha alterada com sucesso!";
    header('Location: login.php');
    exit;
} else {
    die('Método inválido.');
}