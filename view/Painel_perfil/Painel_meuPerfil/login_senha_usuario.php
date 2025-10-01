<?php
session_start();

if (!isset($_SESSION['email_login'])) {
    header("Location: login_email_usuario.php");
    exit;
}
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
                Digite sua senha do<br>Mercado Livre
                <div class="account-box">
                <div class="account-info">
                    <div class="icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="#3483fa"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.999 15.75C15.7275 15.75 18.75 12.7275 18.75 8.999C18.75 5.27053 15.7275 2.248 11.999 2.248C8.27053 2.248 5.248 5.27053 5.248 8.999C5.248 12.7275 8.27053 15.75 11.999 15.75ZM11.999 14.25C9.09895 14.25 6.748 11.899 6.748 8.999C6.748 6.09895 9.09895 3.748 11.999 3.748C14.899 3.748 17.25 6.09895 17.25 8.999C17.25 11.899 14.899 14.25 11.999 14.25Z" fill="#3483fa"></path><path d="M5.98045 18.75C4.74861 18.75 3.75 19.7486 3.75 20.9804V21.7304H2.25V20.9804C2.25 18.9202 3.92018 17.25 5.98045 17.25H18C20.0711 17.25 21.75 18.9289 21.75 21V21.75H20.25V21C20.25 19.7574 19.2426 18.75 18 18.75H5.98045Z" fill="#3483fa"></path></svg>
                    </div>
                    <div>
                        <p> <?php echo htmlspecialchars($_SESSION['email_login']); ?></p>
                        <a href="/livre_mercado/view/Painel_perfil/Painel_meuPerfil/login_email_usuario.php">Trocar conta</a>
                    </div>
                </div>
            </div>
            </div>
            

            <div class="login-box">
                <form action="/livre_mercado/model/usuarios/Painel_loginConta/login.php" method="post">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" required>
                    <div class="btn-group">
                        <button type="submit" class="btn-form">Iniciar sessão</button>
                        <button class="btn-senha" onclick="window.location.href='/livre_mercado/model/usuarios/Painel_senha/recuperar_senha.php'" >Esqueceu a sua senha?</button>
                    </div>
                </form>
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
