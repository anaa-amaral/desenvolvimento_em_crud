CREATE DATABASE bumba_meupao;

USE bumba_meupao;

CREATE TABLE usuarios (
    id_usuarios INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha_hash VARCHAR (20),
    telefone VARCHAR (20),
    data_contratação TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE produtos(
    id_produtos INT AUTO_INCREMENT PRIMARY KEY,
    id_usuarios INT NOT NULL,
    nome VARCHAR (100) NOT NULL,
    descricao TEXT NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    quantidade_estoque INT NOT NULL,
   
    FOREIGN KEY (id_usuarios) REFERENCES usuarios(id_usuarios)

);


CREATE TABLE clientes(
    id_clientes INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    telefone VARCHAR (90),
    endereco VARCHAR(255),
    data_cadastro DATE NOT NULL
);

CREATE TABLE pedidos(
    id_pedidos INT AUTO_INCREMENT PRIMARY KEY,
    id_clientes INT NOT NULL,
    id_produtos INT NOT NULL,

    quantidade INT NOT NULL,
    data_pedido datetime NOT NULL,
    status VARCHAR (50) NOT NULL,
    
    FOREIGN KEY (id_clientes) references clientes (id_clientes),
    FOREIGN KEY (id_produtos) references produtos (id_produtos)
);

INSERT INTO `usuarios` (`id_usuarios`, `nome`, `email`, `senha_hash`, `telefone`, `data_contratação`) VALUES (NULL, 'Usuário de Teste', 'teste@teste.com', '123', '47999999999', CURRENT_TIMESTAMP);
INSERT INTO `clientes` (`id_clientes`, `nome`, `email`, `telefone`, `endereco`, `data_cadastro`) VALUES (NULL, 'Cliente de Teste', 'teste@cliente.com', '47999999999', 'rua qualquer', '2025-08-15');