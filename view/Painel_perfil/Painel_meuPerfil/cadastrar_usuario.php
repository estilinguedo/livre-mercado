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
    <title>Livre mercado</title>
    <link rel="stylesheet" href="../../../css/default.css"> 
    <link rel="stylesheet" href="../../../css/cadastro.css"> 
    <link href="/livre_mercado/imagens/logos/livre_mercado_logo.png" rel="icon" data-head-react="true">
</head>
<body>
    <header>
        <section class="conteudo_header">
                <figure>
                     <a href="/livre_mercado/view/Painel_principal/pagina_inicial.php">
                        <img id="logo_texto" src="/livre_mercado/imagens/Logos/livre_mercado_logo_com_texto.png" alt="Logo Livre Mercado">
                    </a>
                </figure>
        </section>
    </header>
    <main>
        
        <h2>Crie sua conta e compre com<br>frete grátis</h2>

        <div class="form-container">
        <form  action="/livre_mercado/model/usuarios/Painel_cadastroConta/cadastro.php" method="post">
            <input type="text" placeholder="Nome" name="nome"  required>
            <input type="text"  placeholder="CPF ou CNPJ" name="cpf_cnpj" required><br>
            <input type="email" placeholder="E-mail" name="email" required>
            <input type="tel" placeholder="+55 DDD + número." name="telefone"  required>
            <input type="password" placeholder="Senha" name="senha" required>
            <input type="password"  placeholder="Confirme a senha" name="confirmar_senha" required><br><br>
            <div>
                <input type="checkbox" id="whatsapp" checked>
                <label for="whatsapp">Aceito que entrem em contato comigo por SMS e WhatsApp.</label>
            </div>

            <p>Ao "Continuar", aceito os <a href="#">Termos e condições</a> e autorizo o uso dos meus dados de acordo com a <a href="#">Declaração de privacidade</a>.</p>

            <button type="submit">Continuar</button>
        </form>
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