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
    <link rel="stylesheet" href="../../../../css/default.css">
     <link rel="stylesheet" href="/livre_mercado/css/anuncio.css">
    <link href="/livre_mercado/imagens/logos/livre_mercado_logo.png" rel="icon" data-head-react="true">
    <script src="/livre_mercado/js/menu_categorias.js" defer></script>
    <script src="/livre_mercado/js/menu_aside.js" defer></script>
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
    <div class="container">
        <div>
            <h1>Anúncios</h1>
            <div class="guias_anuncio">
                <a href="#">Gestão de anúncios</a>
                <a href="#">Central de promoções</a>
                <a href="#">Gestão de preços</a>
        </div>
        </div>
        <div>
            <button class="botao_anuncio" onclick="window.location.href='/livre_mercado/view/Painel_perfil/Painel_vendedor/painel_anúncios/adicionar_anuncio.php'">Anunciar</button>
        </div>
    </div>
    <div class="container">
        <section class="controls" aria-label="filtros e busca">
            <div class="busca_filtros">
                <div class="busca_anuncio">
                <svg width="18" height="18" viewBox="0 0 24 24" style="margin-right:8px;opacity:.6">
                    <path d="M21 21l-4.35-4.35" stroke="#666" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" fill="none"></path>
                    <circle cx="11" cy="11" r="6" stroke="#666" stroke-width="1.6" fill="none"></circle>
                </svg>
                <input placeholder="Título, código universal, SKU ou #" />
                </div>

                <div class="filtros_busca_anuncio">
                <div class="filtro_item">Filtrar e ordenar</div>
                <div class="filtro_item">Ativos</div>
                <div class="filtro_item">Inativos</div>
                </div>
            </div>

            <div class="quantidade_anuncio">
                <div class="numero_anuncio">0 Anúncios</div>
                <div class="link_ajuda_anuncio"> | <a href="">Preciso de ajuda</a></div>
            </div>
        </section>
        <section class="table-actions" aria-label="ações em massa">
            <button disabled>Pausar</button>
            <button disabled>Reativar</button>
            <button disabled>Excluir</button>
            <button>Alterar no Editor em massa <img src="/livre_mercado/imagens/icones/seta_botao_icon.png" alt=""></button>
            
            <button>Alterar pelo Excel<img src="/livre_mercado/imagens/icones/seta_botao_icon.png" alt=""></button>
        </section>
        <section>
            <div class="cartao_anuncio">
                <img src="/livre_mercado/imagens/icones/anuncios_icon/anuncio_icon.png" alt="">
                <h2>Você ainda não possui anúncios</h2>
                <p>Pode criar um e começar a vender quando quiser.</p>
                <a class="link_anunciar" href="/livre_mercado/view/Painel_perfil/Painel_vendedor/painel_anúncios/adicionar_anuncio.php">Anunciar agora</a>
            </div>
        </section>
    </div>
</main>

<aside>
        <div class="barra_lateral">
            <h3>Minha conta</h3>
            <ul>
                <li>
                    <img src="/livre_mercado/imagens/icones/anuncios_icon/compras_icon.png" alt="">
                    <button class="botao_expandir_barra_lateral">Compras</button>
                    <ul>
                        <li>
                            <a href="/livre_mercado/view/Painel_compras/pagina_pedidos.php">Compras</a>
                        </li>
                        <li>
                            <a href="/livre_mercado/view/Painel_perfil/Painel_vendedor/painel_perguntas/perguntas.php">Perguntas</a>
                        </li>
                        <li>
                            <a href="#">Opniões</a>
                        </li>
                        <li>
                            <a href="#">Favoritos</a>
                        </li>
                        <li>
                            <a href="#">Lojas que sigo</a>
                        </li>
                        <li>
                            <a href="#">Listas de presentes</a>
                        </li>
                        <li>
                            <a href="#">Veículos e imóveis</a>
                        </li>
                        <li>
                            <a href="#">Buscas salvas</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <img src="/livre_mercado/imagens/icones/anuncios_icon/vendas_icon.png" alt="">
                    <button class="botao_expandir_barra_lateral">Vendas</button>
                    <ul>
                        <li>
                            <a href="">Resumo</a>
                        </li>
                        <li>
                            <a href="">Novidades</a>
                        </li>
                        <li>
                            <a href="/livre_mercado/view/Painel_perfil/Painel_vendedor/painel_anúncios/anuncios.php">Anúncios</a>
                        </li>
                        <li>
                            <a href="/livre_mercado/view/Painel_perfil/Painel_vendedor/painel_perguntas/perguntas.php">Perguntas</a>
                        </li>
                        <li>
                            <a href="/livre_mercado/view/Painel_perfil/Painel_vendedor/painel_vendas/vendas.php">Vendas</a>
                        </li>
                        <li>
                            <a href="">Pós-venda</a>
                        </li>
                        <li>
                            <a href="">Métricas</a>
                        </li>
                        <li>
                            <a href="">Reputação</a>
                        </li>
                        <li>
                            <a href="">Preferências de venda</a>
                        </li>
                        <li>
                            <a href="">Central de vendedores</a>
                        </li>
                        <li>
                            <a href="">Veículos e imóveis</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <img src="/livre_mercado/imagens/icones/anuncios_icon/marketing_icon.png" alt="">
                    <button class="botao_expandir_barra_lateral">Marketing</button>
                    <ul>
                        <li>
                            <a href="">Central de marketing</a>
                        </li>
                        <li>
                            <a href="">Publicidade</a>
                        </li>
                        <li>
                            <a href="">Promoções</a>
                        </li>
                        <li>
                            <a href="">Minha página</a>
                        </li>
                        <li>
                            <a href="">Canal de transmissão</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <img src="/livre_mercado/imagens/icones/anuncios_icon/emprestimo_icon.png" alt="">
                    <button>Empréstimos</button>
                </li>
                <li>
                    <img src="/livre_mercado/imagens/icones/anuncios_icon/assinatura_icon.png" alt="">
                    <button>Assinaturas</button>
                </li>
                <li>
                    <img src="/livre_mercado/imagens/icones/anuncios_icon/bioLivre_icon.png" alt="">
                    <button>Bio livre</button>
                </li>
                <li>
                    <img src="/livre_mercado/imagens/icones/anuncios_icon/faturamento_icon.png" alt="">
                    <button class="botao_expandir_barra_lateral">Faturamento</button>
                    <ul>
                        <li>
                            <a href="#">Tarifas e pagamentos</a>
                        </li>
                        <li>
                            <a href="#">Emissor de NF-e</a>
                        </li> 
                    </ul>
                </li>
                <li>
                    <img src="/livre_mercado/imagens/icones/anuncios_icon/perfil_icon.png" alt="">
                    <button onclick="window.location.href='/livre_mercado/view/Painel_perfil/Painel_meuPerfil/Perfil_usuario.php'">Meu perfil</a></button>
                </li>
                <li>
                    <img src="/livre_mercado/imagens/icones/anuncios_icon/configuracoes_icon.png" alt="">
                    <button class="botao_expandir_barra_lateral">Configurações</button>
                    <ul>
                        <li>
                            <a href="#">Minhas marcas</a>
                        </li> 
                    </ul>
                </li>
            </ul>
        </div>
    </aside>
<footer>
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