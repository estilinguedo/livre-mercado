<?php
session_start();
require_once "../../../factory/conexao.php";

if (!isset($_SESSION['email_login'])) {
    header("Location: login_email_usuario.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senha = $_POST['senha'];
    $email = $_SESSION['email_login'];

    $db = new Caminho();
    $conn = $db->getConn();

    $consulta = $conn->prepare("SELECT id_usuario, nome, senha_hash, tipo_usuario 
                                FROM usuarios WHERE email = :email");
    $consulta->bindParam(':email', $email, PDO::PARAM_STR);
    $consulta->execute();

    if ($consulta->rowCount() > 0) {
        $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

        if (password_verify($senha, $usuario['senha_hash'])) {
            $_SESSION['id_usuario']   = $usuario['id_usuario'];
            $_SESSION['nome_usuario'] = $usuario['nome'];
            $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];

            unset($_SESSION['id_login_temp'], $_SESSION['nome_login_temp']);

            echo "<script>alert('Login realizado com sucesso!'); 
                  window.location.href='/livre_mercado/view/Painel_principal/pagina_inicial.php';</script>";
            exit;
        } else {
            echo "<script>alert('Senha incorreta!'); 
                  window.location.href='/livre_mercado/view/Painel_perfil/Painel_meuPerfil/login_senha_usuario.php';</script>";
            exit;
        }
    } else {
        echo "<script>alert('Usuário não encontrado!'); 
              window.location.href='/livre_mercado/view/Painel_perfil/Painel_meuPerfil/login_email_usuario.php';</script>";
        exit;
    }
} else {
    header("Location: /livre_mercado/view/Painel_perfil/Painel_meuPerfil/login_email_usuario.php");
    exit;
}