<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre mercado</title>
    <link rel="stylesheet" href="/livre_mercado/css/default.css">
    <link rel="stylesheet" href="/livre_mercado/css/carrinho.css">
    <link href="../../imagens/logos/livre_mercado_logo.png" rel="icon" data-head-react="true">
    <script src="/livre_mercado/js/menu_categorias.js" defer></script>
</head>
<body>
    <header>
        <section class="conteudo_header">
            <nav class="busca">    
                <figure>
                    <a href="#">
                        <img id="logo_texto" src="/livre_mercado/imagens/Logos/livre_mercado_logo_com_texto.png" alt="Logo Livre Mercado">
                    </a>
                </figure>
                <div id="busca">
                    <input type="text" name="pesquisa_produto" value="" class="" id="barra_pesquisa" placeholder="Buscar produtos, marcas e muito mais…" maxlength="120"
                    autocapitalize="off">
                    <button type="submit" id="botao_buscar">
                        <svg width="21px" height="21px" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 6.5C10 8.433 8.433 10 6.5 10C4.567 10 3 8.433 3 6.5C3 4.567 4.567 3 6.5 3C8.433 3 10 4.567 10 6.5ZM9.30884 10.0159C8.53901 10.6318 7.56251 11 6.5 11C4.01472 11 2 8.98528 2 6.5C2 4.01472 4.01472 2 6.5 2C8.98528 2 11 4.01472 11 6.5C11 7.56251 10.6318 8.53901 10.0159 9.30884L12.8536 12.1464C13.0488 12.3417 13.0488 12.6583 12.8536 12.8536C12.6583 13.0488 12.3417 13.0488 12.1464 12.8536L9.30884 10.0159Z" fill="#696969"/>
                        </svg>
                    </button>
                </div>
                <div role="listbox" class="lista_sugestao">
                    <ul role="group" class="item_sugestao"></ul>
                    <div role="group" class="loja_sugestao" >
                        <ul role="presentation" class="loja_item_sugestao"></ul>
                    </div>
                </div>
                <div class="anuncio_cabecalho">
                    <a href="">
                        <img id="imagem_meli" src="/livre_mercado/imagens/anuncio_header.jpeg" alt="Meli+. A partir de R$8,90/mês com cashback e descontos exclusivos. Consulte termos e condições.">     
                    </a>
                </div>
            </nav>
            <nav class="navegacao">
                <div class="cep_cabecalho">
                    <a class="cep_link" href=""> 
                        <img src="/livre_mercado/imagens/icones/mapa_icone.png" alt="" class="icone">
                        <span class="cep_texto">Informe seu<span style="font-size: 14px; color: rgba(0, 0, 0, 1);"><br>CEP</span></span>
                    </a>    
                </div>
               
                
                <div class="navegacao_centro">        
                    <div class="navegacao_categoria">
                        <div class="navegacao_cabecalho">
                            <button id="categorias_botao" type="button" aria-haspopup="true" aria-expanded="false" class="categorias_btn">
                            Categorias
                            <img src="/livre_mercado/imagens/icones/seta_botao_icon.png" class="seta" alt="">
                            </button>
                        </div>
                        <ul class="lista_categoria" id="menu_categorias" role="menu" aria-label="Categorias">
                            <li role="none"><a role="menuitem" href="#">Veículos</a></li>
                            <li role="none"><a role="menuitem" href="#">Supermercado</a></li>
                            <li role="none" class="lista_categoria_item"><a role="menuitem" href="#">Tecnologia</a></li>
                            <li role="none"><a role="menuitem" href="#">Casa e Móveis</a></li>
                            <li role="none"><a role="menuitem" href="#">Eletrodomésticos</a></li>
                            <li role="none"><a role="menuitem" href="#">Esportes e Fitness</a></li>
                            <li role="none"><a role="menuitem" href="#">Ferramentas</a></li>
                            <li role="none"><a role="menuitem" href="#">Construção</a></li>
                            <li role="none"><a role="menuitem" href="#">Indústria e Comércio</a></li>
                            <li role="none"><a role="menuitem" href="#">Para seu Negócio</a></li>
                            <li role="none"><a role="menuitem" href="#">Pet Shop</a></li>
                            <li role="none"><a role="menuitem" href="#">Saúde</a></li>
                            <li role="none"><a role="menuitem" href="#">Acessórios para Veículos</a></li>
                            <li role="none"><a role="menuitem" href="#">Beleza e Cuidado Pessoal</a></li>
                            <li role="none"><a role="menuitem" href="#">Moda</a></li>
                            <li role="none"><a role="menuitem" href="#">Bebês</a></li>
                            <li role="none"><a role="menuitem" href="#">Brinquedos</a></li>
                            <li role="none"><a role="menuitem" href="#">Imóveis</a></li>
                            <li role="none"><a role="menuitem" href="#">Compra Internacional</a></li>
                            <li role="none"><a role="menuitem" href="#">Produtos Sustentáveis</a></li>
                            <li role="none"><a role="menuitem" href="#">Mais vendidos</a></li>
                            <li role="none"><a role="menuitem" href="#">Lojas oficiais</a></li>
                            <li role="none"><a role="menuitem" href="#">Ver mais categorias</a></li>
                        </ul>
                    </div>   
                    </ul>
                        <li class="navegacao_item">
                            <a href="" class="navegacao_link" >Ofertas</a>
                        </li>
                        <li class="navegacao_item">
                            <a href="" class="navegacao_link" >Cupons</a>
                        </li>
                        <li class="navegacao_item">
                            <a href="" class="navegacao_link" >Supermercado</a>
                        </li>
                        <li class="navegacao_item">
                            <a href="" class="navegacao_link" rel="">Moda</a>
                        </li>
                        <li class="navegacao_item">
                            <a href="" class="navegacao_link" rel="">Mercado Play</a>
                        </li>
                        <li class="navegacao_item">
                            <a href="/livre_mercado/view/Painel_perfil/Painel_vendedor/painel_vendas/vendas.php" class="navegacao_link" rel="">Vender</a>
                        </li>
                        <li class="navegacao_item">
                            <a href="" class="navegacao_link" rel="">Contato</a>
                        </li>
                    </ul>     
                </div> 
                <div class="conta_cabecalho">         
                    <ul class="lista_conta">
                       <?php if (isset($_SESSION['id_usuario'])): ?>
                            <!-- Usuário logado -->
                            <li class="conta_item navegacao_perfil">
                                <button id="perfil_botao" type="button" aria-haspopup="true" aria-expanded="false" class="conta_link">
                                    <span class="perfil_pequeno">
                                        <?= strtoupper(substr($_SESSION['nome_usuario'], 0, 2)) ?>
                                    </span>
                                    <span class="nome_pequeno">
                                        <?= htmlspecialchars($_SESSION['nome_usuario']) ?>
                                    </span>
                                    <img src="/livre_mercado/imagens/icones/seta_botao_icon.png" class="seta" alt="">
                                </button>

                                <ul class="lista_perfil" id="menu_perfil" role="menu" aria-label="Perfil">
                                    <li class="perfil_top">
                                        <div class="perfil_container">
                                            <div class="circulo_perfil">
                                                <?= strtoupper(substr($_SESSION['nome_usuario'], 0, 2)) ?>
                                            </div>
                                            <div class="perfil_textos">
                                                <div class="perfil_nome"><?= strtoupper($_SESSION['nome_usuario']) ?></div>
                                                <div class="perfil_meu">
                                                    <a href="/livre_mercado/view/Painel_perfil/Painel_meuPerfil/Perfil_usuario.php">Meu perfil ›</a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </li>
                                    <li class="perfil_li_propaganda"><div class="promo-bar">meli+ | Assine com 60% OFF ›</div></li>
                                    <li><a href="/livre_mercado/view/Painel_compras/pagina_pedidos.php">Compras</a></li>
                                    <li><a href="#">Histórico</a></li>
                                    <li><a href="/livre_mercado/view/Painel_perfil/Painel_vendedor/painel_perguntas/perguntas.php">Perguntas</a></li>
                                    <li><a href="#">Opiniões</a></li>

                                    <li class="separador"></li>
                                    <li><a href="/livre_mercado/view/Painel_perfil/Painel_vendedor/painel_vendas/vendas.php">Vender</a></li>
                                    <li class="separador"></li>
                                    <li><a href="/livre_mercado/model/usuarios/Painel_sairConta/logout.php">Sair</a></li>
                                </ul>
                            </li>

                            <li class="conta_item">
                                <a href="/livre_mercado/view/Painel_compras/pagina_pedidos.php" class="conta_link">Compras</a>
                            </li>
                            <li class="conta_item">
                                <a href="#" class="conta_link">Favoritos</a>
                                <img class="seta"src="/livre_mercado/imagens/icones/seta_botao_icon.png" class="icone" alt="">
                            </li>
                            <li class="conta_item">
                                <img src="/livre_mercado/imagens/icones/notificacao_icon.png" class="icone" alt="">
                                <a href="#" class="conta_link">avisos</a>
                            </li>
                            <li class="conta_item">
                                <a href="/livre_mercado/view/Painel_compras/pagina_carrinho.php" class="conta_link">
                                    <img src="/livre_mercado/imagens/icones/carrinho_icon.png" alt="" class="icone carrinho">
                                </a>
                            </li>
                        <?php else: ?>
                            <!-- Visitante -->
                            <li class="conta_item">
                                <a href="/livre_mercado/view/Painel_perfil/Painel_meuPerfil/cadastrar_usuario.php" class="conta_link">Crie a sua conta</a>
                            </li>
                            <li class="conta_item">
                                <a href="/livre_mercado/view/Painel_perfil/Painel_meuPerfil/login_email_usuario.php" class="conta_link">Entre</a>
                            </li>
                        <?php endif; ?>
                    </ul>     
                </div>
            </nav>
        </section>
    </header>
    <main>
        <div class="page">
            <div class="container">
            <div class="topbar">
                <div class="caminho_paginas">
                <a href="#">Produtos ⚡FULL</a>
                </div>
                <div class="acoes_topo">
                <a href="#">Preciso de ajuda</a>
                <button class="botao_config">Configurações <img src="#" alt="" style="width:14px;height:14px;visibility:hidden"></button>
                </div>
            </div>
            </div>
            <div class="container main">
                <section class="cartao">
                    <h1>Seu carrinho</h1>
                    <section class="prod-list">
                        <article class="prod-item">
                            <label class="carrinho">
                            <input class="carrinho-input" type="checkbox" checked aria-label="Selecionar produto">
                            <span class="carrinho-box" aria-hidden="true">
                                <svg viewBox="0 0 16 16" class="carrinho-svg" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.78786 9.39574L11.3645 4.81909L12.393 5.84761L6.78786 11.4528L3.60693 8.27185L4.63545 7.24333L6.78786 9.39574Z"/>
                                </svg>
                            </span>
                            </label>
                            <div class="thumb">IMG</div>

                            <div class="prod-main">
                                <div class="prod-row">
                                    <div class="prod-title">produto 1</div>
                                    <div>
                                        <div class="qty" aria-label="quantidade">
                                            <button aria-label="diminuir">−</button>
                                            <div class="count">3</div>
                                            <button aria-label="aumentar">+</button>
                                        </div>
                                        <div class="disponiveis">+30 disponíveis</div>
                                    </div>
                                   
                                </div>
                                    <div class="prod-sub"><a href="#" style="color:var(--accent);text-decoration:none">Excluir</a></div>
                                </div>
                                <div class="price-col">
                                    <div class="meta">
                                        <div class="discount">-20%</div>
                                        <div class="old-price">R$ 100</div>
                                </div>
                                <div class="final">R$ 80</div>
                            </div>
                        </article>

                        <article class="prod-item">
                            <label class="carrinho">
                            <input class="carrinho-input" type="checkbox" checked aria-label="Selecionar produto">
                            <span class="carrinho-box" aria-hidden="true">
                                <svg viewBox="0 0 16 16" class="carrinho-svg" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.78786 9.39574L11.3645 4.81909L12.393 5.84761L6.78786 11.4528L3.60693 8.27185L4.63545 7.24333L6.78786 9.39574Z"/>
                                </svg>
                            </span>
                            </label>
                            <div class="thumb">IMG</div>

                           <div class="prod-main">
                                <div class="prod-row">
                                    <div class="prod-title">produto 2</div>
                                    <div>
                                        <div class="qty" aria-label="quantidade">
                                            <button aria-label="diminuir">−</button>
                                            <div class="count">3</div>
                                            <button aria-label="aumentar">+</button>
                                        </div>
                                         <div class="disponiveis">+30 disponíveis</div>
                                    </div>
                                </div>
                                    <div class="prod-sub"><a href="#" style="color:var(--accent);text-decoration:none">Excluir</a></div>
                                </div>
                                <div class="price-col">
                                    <div class="meta">
                                        <div class="discount">-20%</div>
                                        <div class="old-price">R$ 100</div>
                                </div>
                                <div class="final">R$ 80</div>
                            </div>
                        </article>

                        <article class="prod-item">
                           <label class="carrinho">
                            <input class="carrinho-input" type="checkbox" checked aria-label="Selecionar produto">
                            <span class="carrinho-box" aria-hidden="true">
                                <svg viewBox="0 0 16 16" class="carrinho-svg" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.78786 9.39574L11.3645 4.81909L12.393 5.84761L6.78786 11.4528L3.60693 8.27185L4.63545 7.24333L6.78786 9.39574Z"/>
                                </svg>
                            </span>
                            </label>
                            <div class="thumb">IMG</div>

                            <div class="prod-main">
                                <div class="prod-row">
                                    <div class="prod-title">produto 3</div>
                                    <div>
                                        <div class="qty" aria-label="quantidade">
                                            <button aria-label="diminuir">−</button>
                                            <div class="count">3</div>
                                            <button aria-label="aumentar">+</button>
                                        </div>
                                         <div class="disponiveis">+30 disponíveis</div>
                                    </div>
                                </div>
                                    <div class="prod-sub"><a href="#" style="color:var(--accent);text-decoration:none">Excluir</a></div>
                                </div>
                                <div class="price-col">
                                    <div class="meta">
                                        <div class="discount">-20%</div>
                                        <div class="old-price">R$ 100</div>
                                </div>
                                <div class="final">R$ 80</div>
                            </div>
                        </article>

                        <article class="prod-item">
                            <label class="carrinho">
                            <input class="carrinho-input" type="checkbox" checked aria-label="Selecionar produto">
                            <span class="carrinho-box" aria-hidden="true">
                                <svg viewBox="0 0 16 16" class="carrinho-svg" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.78786 9.39574L11.3645 4.81909L12.393 5.84761L6.78786 11.4528L3.60693 8.27185L4.63545 7.24333L6.78786 9.39574Z"/>
                                </svg>
                            </span>
                            </label>
                            <div class="thumb">IMG</div>
                            <div class="prod-main">
                                <div class="prod-row">
                                    <div class="prod-title">produto 4</div>
                                    <div>
                                        <div class="qty" aria-label="quantidade">
                                            <button aria-label="diminuir">−</button>
                                            <div class="count">3</div>
                                            <button aria-label="aumentar">+</button>
                                        </div>
                                         <div class="disponiveis">+30 disponíveis</div>
                                    </div>
                                </div>
                                <div class="prod-sub"><a href="#" style="color:var(--accent);text-decoration:none">Excluir</a></div>
                                </div>
                                <div class="price-col">
                                    <div class="meta">
                                        <div class="discount">-20%</div>
                                        <div class="old-price">R$ 100</div>
                                </div>
                                <div class="final">R$ 80</div>
                            </div>
                        </article>
                    </section>

                    <div class="line"><span class="frete-note">Frete</span> <span><strong class="frete-note-resultado">Grátis</strong></span></div>
                
                    <div style="font-size:13px;color:var(--muted)">Aproveite o frete grátis adicionando mais produtos ⚡ FULL. <a href="#" style="color:var(--accent)">Ver produtos ></a></div>
                </section>
                <aside class="resumo-compra">
                    <h3>Resumo da compra</h3>
                    
                    <div class="linha">
                        <span>Produtos (2)</span>
                        <span><s>R$ 400,00</s> R$ 320,00</span>
                    </div>

                    <div class="linha">
                        <span>Frete</span>
                        <span class="verde">Grátis</span>
                    </div>

                    <div class="linha link">
                        <a href="#">Cupons</a>
                    </div>

                    <div class="linha total">
                        <span>Total</span>
                        <span>R$ 320,00</span>
                    </div>

                    <button class="btn-comprar " onclick="window.location.href='/livre_mercado/view/Painel_compras/pagina_finalizar_compra.php'">Continuar a compra</button>
                </aside>
            </div>
            <div class="container">
            <div>
                <h3>Produtos que te interessaram</h3>
                <p style="margin:0;color:var(--muted)">Sugestões personalizadas com base no seu carrinho.</p>
            </div>
            </div>
        </div>
    </main>
    <footer  >
        <section class="mais_info">
            <button id="toggleInfo">
                <span>Mais informações</span>
                <img src="/livre_mercado/imagens/icones/seta_botao_icon.png" alt="">
            </button>

            <div class="info_extra" id="infoExtra">
                <div class="info_extra_conteudo">
                    <div class="info_nav">
                        <h3>Sobre o</h3>
                        <ul>
                            <li><a href=""><span>Mercado Livre</span></a></li>
                            <li><a href=""><span>Investor relations</span></a></li>
                            <li><a href=""><span>Tendências</span></a></li>
                            <li><a href=""><span>Sustentabilidade</span></a></li>
                            <li><a href=""><span>Blog</span></a></li>
                        </ul>
                    </div>
                    <div class="info_nav">
                        <h3>Outros sites</h3>
                        <ul>
                            <li><a href=""><span>Desenvolvedores</span></a></li>
                            <li><a href=""><span>Mercado Pago</span></a></li>
                            <li><a href=""><span>Envios</span></a></li>
                            <li><a href=""><span>Mercado Shops</span></a></li>
                            <li><a href=""><span>Mercado Ads</span></a></li>
                        </ul>
                    </div>
                    <div class="info_nav">
                        <h3>Contato</h3>
                        <ul>
                            <li><a href=""><span>Comprar</span></a></li>
                            <li><a href=""><span>Vender</span></a></li>
                            <li><a href=""><span>Solução de problemas</span></a></li>
                            <li><a href=""><span>Segurança</span></a></li>
                        </ul>
                    </div>
                    <div class="info_nav">
                        <h3>Redes sociais</h3>
                        <ul>
                            <li><a href=""><span>X</span></a></li>
                            <li><a href=""><span>Facebook</span></a></li>
                            <li><a href=""><span>Instagram</span></a></li>
                            <li><a href=""><span>Youtube</span></a></li>
                        </ul>
                    </div>
                    <div class="info_nav">
                        <h3>Minha conta</h3>
                        <ul>
                            <li><a href=""><span>Entre</span></a></li>
                            <li><a href=""><span>Vender</span></a></li>
                        </ul>
                    </div>
                    <div class="info_nav">
                        <h3>Assinaturas</h3>
                        <ul>
                            <li><a href=""><span>Meli+</span></a></li>
                            <li><a href=""><span>Disney+</span></a></li>
                            <li><a href=""><span>HBO Max</span></a></li>
                            <li><a href=""><span>Paramount+</span></a></li>
                            <li><a href=""><span>Universal+</span></a></li>
                            <li><a href=""><span>Globoplay Premium</span></a></li>
                        </ul>
                    </div>
                    <div class="info_nav">
                        <h3>Temporadas</h3>
                        <ul>
                            <li><a href=""><span>Dia do consumidor</span></a></li>
                            <li><a href=""><span>Dia das mães</span></a></li>
                            <li><a href=""><span>Black Friday</span></a></li>
                            <li><a href=""><span>Descontaço</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="conteudo_footer">
            <div>
                <div class="info_primaria">
                    <ul>
                        <li><a href="">Trabalhe conosco</a></li>
                        <li><a href="">Termos e condições</a></li>
                        <li><a href="">Promoções</a></li>
                        <li><a href="">Como cuidamos da sua privacidade</a></li>
                        <li><img class="img_info_primaria" src="/livre_mercado/imagens/icones/acessibilidade_icon.png" alt=""><a href="">Acessibilidade</a></li>
                        <li><a href="">Contato</a></li>
                        <li><a href="">Informações sobre seguros</a></li>
                        <li><a href="">Programa de afiliados</a></li>
                        <li><a href="">Lista de presentes</a></li>
                    </ul>
                </div>

                <div class="info_secundaria">
                    <small class="info_secundaria_texto">Copyright © 1999-2025 Ebazar.com.br LTDA.</small>
                    <p class="info_secundaria_texto">CNPJ n.º 03.007.331/0001-41 / Av. das Nações Unidas, nº 3.003, Bonfim, Osasco/SP - CEP 06233-903 - empresa do grupo Mercado Livre.</p>
                </div>
            </div>
        </section>
    </footer>
</body>

</html>