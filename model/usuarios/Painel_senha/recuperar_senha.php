<?php
session_start();
require_once "../../../factory/conexao.php";

define('BASE_URL', 'http://localhost/livre_mercado');

$mensagem_usuario = '';
if (isset($_SESSION['msg'])) {
    $mensagem_usuario = $_SESSION['msg'];
    unset($_SESSION['msg']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');

    if (empty($email)) {
        $_SESSION['msg'] = "Digite um e-mail válido.";
    } else {
        try {
            $db = new Caminho();
            $conn = $db->getConn();

            $stmt = $conn->prepare("SELECT id_usuario FROM usuarios WHERE email = :email");
            $stmt->execute([':email' => $email]);
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario) {
                $id_usuario = $usuario['id_usuario'];
                $token = bin2hex(random_bytes(32));
                $expiracao = date('Y-m-d H:i:s', strtotime('+1 hour'));

                $stmt = $conn->prepare("INSERT INTO recuperacoes_senha (id_usuario, token, data_expiracao) 
                                        VALUES (:id_usuario, :token, :expiracao)");
                $stmt->execute([
                    ':id_usuario' => $id_usuario,
                    ':token' => $token,
                    ':expiracao' => $expiracao
                ]);

                $link = BASE_URL . "/view/Painel_perfil/Painel_meuPerfil/resetar_senha.php?token=$token";

                $assunto = "Recuperação de senha - Livre Mercado";
                $mensagem_email = "Olá!\n\nPara redefinir sua senha, clique no link a seguir:\n\n" 
                                . $link . "\n\nEste link expira em 1 hora.";
                $headers = "From: nao-responda@livremercado.com\r\n" .
                           "Content-Type: text/plain; charset=UTF-8\r\n";

                mail($email, $assunto, $mensagem_email, $headers);
            }

            $_SESSION['msg'] = "Se o e-mail estiver cadastrado, um link de recuperação foi enviado.";
        } catch (PDOException $e) {
            $_SESSION['msg'] = "Erro no servidor: " . $e->getMessage();
        }
    }

    header("Location: recuperar_senha.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Recuperar Senha</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Recuperar Senha</h1>

    <?php if (!empty($mensagem_usuario)): ?>
        <p style="color:green;"><?= htmlspecialchars($mensagem_usuario) ?></p>
    <?php endif; ?>

    <form method="POST" action="recuperar_senha.php">
        <label for="email">Digite seu e-mail:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <button type="submit">Enviar Link de Recuperação</button>
    </form>

    <br>
    <a href="/mercado_livre/view/Painel_perfil/Painel_meuPerfil/login_email_usuario.php">Voltar para o Login</a>
</body>
</html>
