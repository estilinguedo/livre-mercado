<?php
session_start();
session_destroy(); 
session_start();   
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre Mercado</title>
    <link rel="stylesheet" href="../../../css/default.css"> 
    <link rel="stylesheet" href="../../../css/login.css"> 
    <link href="/livre_mercado/imagens/logos/livre_mercado_logo.png" rel="icon" data-head-react="true">
</head>
<body>
    <header>
        <figure>
             <a href="/livre_mercado/view/Painel_principal/pagina_inicial.php">
                <img id="logo_texto" src="/livre_mercado/imagens/Logos/livre_mercado_logo_com_texto.png" alt="Logo Livre Mercado">
            </a>
        </figure>
    </header>

    <main>
        <section class="login">
            <div class="text-left">
                Digite seu e-mail ou telefone<br>
                para iniciar sessão
            </div>

            <div class="login-box">
                <form action="/livre_mercado/model/usuarios/Painel_loginConta/verificar_email.php" method="post">
                    <input type="text" name="email" placeholder="E-mail ou telefone" required>
                    <button type="submit" class="btn-form">Continuar</button>
                </form>

                <a href="/livre_mercado/view/Painel_perfil/Painel_meuPerfil/cadastrar_usuario.php">Criar conta</a>

                <div class="divider">
                    <hr><span>ou</span><hr>
                </div>

                <div class="google-login">
                    Fazer login com Google
                    <img src="/livre_mercado/imagens/icones/google_icon.png" alt="Google">
                </div>
            </div>
        </section>
        <div class="help-links">
            <div class="security-btn">
                <img src="/livre_mercado/imagens/icones/seguranca_login_icon.png" alt="Segurança">
                Tenho um problema de segurança
                <svg aria-hidden="true" width="20" height="20" viewBox="0 0 20 20" fill="rgba(0, 0, 0, 0.55)"><path d="M8.27686 4.34644L7.42834 5.19496L12.224 9.99059L7.42334 14.7912L8.27187 15.6397L13.921 9.99059L8.27686 4.34644Z" fill="rgba(0, 0, 0, 0.55)"></path></svg>
            </div>
            <a href="#">Preciso de ajuda</a>
        </div>
    </main>
    <footer>
        <div class="privacidade_footer">
            <a href="">Como cuidamos da sua privacidade</a>
            <p> - Copyright © 1999-2025 Ebazar.com.br LTDA.</p>
        </div>
        <div>
            <p>Protegido por reCAPTCHA - <a href="#">Privacidade</a> - <a href="#">Condições</a></p>
        </div>
    </footer>
</body>
</html>
