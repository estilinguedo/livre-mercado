drop database if exists sistema_livre_mercado;
create database sistema_livre_mercado;
use sistema_livre_mercado;

CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha_hash VARCHAR(255) NOT NULL,
    telefone VARCHAR(20),
    cpf_cnpj VARCHAR(20) NOT NULL UNIQUE,
    tipo_usuario ENUM('comprador','vendedor','admin') DEFAULT 'comprador',
    endereco_padrao INT DEFAULT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_endereco_padrao FOREIGN KEY (endereco_padrao) REFERENCES enderecos(id_endereco)
);

CREATE TABLE enderecos (
    id_endereco INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    cep VARCHAR(10) NOT NULL,
    rua VARCHAR(150) NOT NULL,
    numero VARCHAR(10) NOT NULL,
    complemento VARCHAR(50), 
    bairro VARCHAR(100) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    estado CHAR(2) NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE
);

CREATE TABLE categorias (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    id_categoria_pai INT DEFAULT NULL,
    FOREIGN KEY (id_categoria_pai) REFERENCES categorias(id_categoria)
);

CREATE TABLE produtos (
    id_produto INT AUTO_INCREMENT PRIMARY KEY,
    id_vendedor INT NOT NULL,
    nome VARCHAR(200) NOT NULL,
    descricao TEXT NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    estoque INT DEFAULT 0,
    id_categoria INT NOT NULL,
    peso DECIMAL(10,3) DEFAULT NULL,
    largura DECIMAL(10,2) DEFAULT NULL,
    altura DECIMAL(10,2) DEFAULT NULL,
    profundidade DECIMAL(10,2) DEFAULT NULL,
    destaque TINYINT(1) DEFAULT 0, -- 1 = produto em destaque/promocional
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('ativo','inativo') DEFAULT 'ativo',
    FOREIGN KEY (id_vendedor) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (id_categoria) REFERENCES categorias(id_categoria)
);

CREATE TABLE imagens_produtos (
    id_imagem INT AUTO_INCREMENT PRIMARY KEY,
    id_produto INT NOT NULL,
    url_imagem VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_produto) REFERENCES produtos(id_produto) ON DELETE CASCADE
);

CREATE TABLE carrinho (
    id_carrinho INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_produto INT NOT NULL,
    quantidade INT NOT NULL DEFAULT 1,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE,
    FOREIGN KEY (id_produto) REFERENCES produtos(id_produto)
);

CREATE TABLE pedidos (
    id_pedido INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_endereco_entrega INT DEFAULT NULL, 
    data_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('aguardando pagamento','pago','enviado','concluido','cancelado') DEFAULT 'aguardando pagamento',
    estoque_atualizado TINYINT(1) DEFAULT 0,
    valor_total DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (id_endereco_entrega) REFERENCES enderecos(id_endereco)
);

CREATE TABLE itens_pedido (
    id_item INT AUTO_INCREMENT PRIMARY KEY,
    id_pedido INT NOT NULL,
    id_produto INT NOT NULL,
    quantidade INT NOT NULL,
    preco_unitario DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (id_pedido) REFERENCES pedidos(id_pedido) ON DELETE CASCADE,
    FOREIGN KEY (id_produto) REFERENCES produtos(id_produto)
);

CREATE TABLE pagamentos (
    id_pagamento INT AUTO_INCREMENT PRIMARY KEY,
    id_pedido INT NOT NULL,
    metodo ENUM('cartao','pix','boleto') NOT NULL,
    status ENUM('pendente','aprovado','recusado') DEFAULT 'pendente',
    data_pagamento TIMESTAMP NULL,
    codigo_transacao VARCHAR(100) DEFAULT NULL, 
    data_vencimento DATE DEFAULT NULL, 
    FOREIGN KEY (id_pedido) REFERENCES pedidos(id_pedido)
);

CREATE TABLE mensagens (
    id_mensagem INT AUTO_INCREMENT PRIMARY KEY,
    id_remetente INT NOT NULL,
    id_destinatario INT NOT NULL,
    conteudo TEXT NOT NULL,
    data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_remetente) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (id_destinatario) REFERENCES usuarios(id_usuario)
);

CREATE TABLE mensagens_pedido (
    id_mensagem INT AUTO_INCREMENT PRIMARY KEY,
    id_pedido INT NOT NULL,
    id_remetente INT NOT NULL,  
    id_destinatario INT NOT NULL,
    conteudo TEXT NOT NULL,
    data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_pedido) REFERENCES pedidos(id_pedido) ON DELETE CASCADE,
    FOREIGN KEY (id_remetente) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (id_destinatario) REFERENCES usuarios(id_usuario)
);

CREATE TABLE avaliacoes (
    id_avaliacao INT AUTO_INCREMENT PRIMARY KEY,
    id_produto INT NOT NULL,
    id_usuario INT NOT NULL,
    nota INT,
    comentario TEXT,
    data_avaliacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_produto) REFERENCES produtos(id_produto),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);
CREATE TABLE recuperacoes_senha ( -- por email
    id_recuperacao INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    token VARCHAR(255) NOT NULL UNIQUE,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_expiracao TIMESTAMP NOT NULL,
    usado TINYINT(1) DEFAULT 0,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE
);
CREATE TABLE historico_precos (
    id_historico INT AUTO_INCREMENT PRIMARY KEY,
    id_produto INT NOT NULL,
    preco_antigo DECIMAL(10,2) NOT NULL,
    preco_novo DECIMAL(10,2) NOT NULL,
    data_alteracao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_produto) REFERENCES produtos(id_produto)
);

CREATE TABLE cupons (
    id_cupom INT AUTO_INCREMENT PRIMARY KEY,
    codigo VARCHAR(50) NOT NULL UNIQUE,
    descricao VARCHAR(255),
    tipo ENUM('percentual','fixo') NOT NULL,
    valor DECIMAL(10,2) NOT NULL,
    data_validade DATE NOT NULL,
    uso_maximo INT DEFAULT 1,
    ativo TINYINT(1) DEFAULT 1
);

CREATE TABLE cupons_usuarios (
    id_cupom INT NOT NULL,
    id_usuario INT NOT NULL,
    data_uso TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_cupom, id_usuario),
    FOREIGN KEY (id_cupom) REFERENCES cupons(id_cupom),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);

CREATE TABLE logs_atividades (
    id_log INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT DEFAULT NULL,
    acao VARCHAR(255) NOT NULL,
    descricao TEXT,
    data_acao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ip_usuario VARCHAR(45),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);
DELIMITER //

CREATE TRIGGER atualiza_estoque
AFTER UPDATE ON pagamentos
FOR EACH ROW
BEGIN
    -- estoque não atualizado 
    IF NEW.status = 'aprovado' AND OLD.status <> 'aprovado' THEN
        IF (SELECT estoque_atualizado FROM pedidos WHERE id_pedido = NEW.id_pedido) = 0 THEN
            UPDATE produtos
            JOIN itens_pedido ON produtos.id_produto = itens_pedido.id_produto
            SET produtos.estoque = produtos.estoque - itens_pedido.quantidade
            WHERE itens_pedido.id_pedido = NEW.id_pedido;
            
            UPDATE pedidos SET estoque_atualizado = 1 WHERE id_pedido = NEW.id_pedido;
        END IF;
    END IF;
    -- estoque já atualizado
    IF OLD.status = 'aprovado' AND NEW.status <> 'aprovado' THEN
        IF (SELECT estoque_atualizado FROM pedidos WHERE id_pedido = NEW.id_pedido) = 1 THEN
            UPDATE produtos
            JOIN itens_pedido ON produtos.id_produto = itens_pedido.id_produto
            SET produtos.estoque = produtos.estoque + itens_pedido.quantidade
            WHERE itens_pedido.id_pedido = NEW.id_pedido;
            
            UPDATE pedidos SET estoque_atualizado = 0 WHERE id_pedido = NEW.id_pedido;
        END IF;
    END IF;
END;
//

DELIMITER ;
DELIMITER //

CREATE TRIGGER historico_preco_update
BEFORE UPDATE ON produtos
FOR EACH ROW
BEGIN
    IF OLD.preco <> NEW.preco THEN
        INSERT INTO historico_precos (id_produto, preco_antigo, preco_novo, data_alteracao)
        VALUES (OLD.id_produto, OLD.preco, NEW.preco, NOW());
    END IF;
END;
//

DELIMITER ;