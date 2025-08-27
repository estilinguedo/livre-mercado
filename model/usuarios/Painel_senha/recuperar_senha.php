<?php
require 'pdo_conexao.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

    if (!$email) {
        $erro = "Email inválido.";
    } else {
        $stmt = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch();

        if (!$usuario) {
            $erro = "Email não encontrado.";
        } else {
            $id_usuario = $usuario['id_usuario'];
            $token = bin2hex(random_bytes(25));
            $agora = date('Y-m-d H:i:s');
            $expiracao = date('Y-m-d H:i:s', strtotime('+1 hour'));

            $stmt = $pdo->prepare("INSERT INTO recuperacoes_senha (id_usuario, token, data_criacao, data_expiracao, usado) VALUES (?, ?, ?, ?, 0)");
            $stmt->execute([$id_usuario, $token, $agora, $expiracao]);

            $base_url = dirname($_SERVER['REQUEST_URI']);
            $link = $base_url . "/resetar_senha.php?token=$token";

            $assunto = "Recuperação de senha";
            $mensagem = "Olá!\n\nPara redefinir sua senha, clique no link abaixo ou copie e cole no seu navegador:\n\n" . $link . "\n\nEste link expira em 1 hora.\n\nSe não solicitou, ignore este email.";
            $headers = "From: no-reply@seusite.com\r\n" .
                       "Content-Type: text/plain; charset=UTF-8\r\n";

            if (mail($email, $assunto, $mensagem, $headers)) {
                echo "Email enviado! Verifique sua caixa de entrada.";
                exit;
            } else {
                $erro = "Erro ao enviar email. Tente novamente mais tarde.";
            }
        }
    }
}

include 'redefinir_senha.php';
