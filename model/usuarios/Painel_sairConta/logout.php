<?php
    session_start();
    session_destroy();
    session_start();
    $_SESSION['mensagem'] = "Você foi deslogado com sucesso!";
    header("Location: /livre_mercado/view/Painel_perfil/Painel_meuPerfil/login_email_usuario.php");
    exit;
?>