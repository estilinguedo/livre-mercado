<?php
session_start();
require_once "../../../factory/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    $db = new Caminho();
    $conn = $db->getConn();

    $consulta = $conn->prepare("SELECT id_usuario, nome FROM usuarios WHERE email = :email");
    $consulta->bindParam(':email', $email, PDO::PARAM_STR);
    $consulta->execute();

    if ($consulta->rowCount() > 0) {
        $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

        $_SESSION['email_login'] = $email;
        $_SESSION['id_login_temp'] = $usuario['id_usuario'];
        $_SESSION['nome_login_temp'] = $usuario['nome'];

        header("Location: /livre_mercado/view/Painel_perfil/Painel_meuPerfil/login_senha_usuario.php");
        exit;
    } else {
        echo "<script>
            alert('Email não encontrado! Verifique e tente novamente.');
            window.location.href='/livre_mercado/view/Painel_perfil/Painel_meuPerfil/login_email_usuario.php';
        </script>";
        exit;
    }
} else {
    header("Location: /livre_mercado/view/Painel_perfil/Painel_meuPerfil/login_email_usuario.php");
    exit;
}
?>