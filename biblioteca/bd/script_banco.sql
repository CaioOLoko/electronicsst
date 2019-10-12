/*

Falta o CRUD das tabelas:

* estoque
* log_produto
* pedido
* pedido_produto

*/

DROP DATABASE IF EXISTS electronicsst;
CREATE DATABASE electronicsst;
USE electronicsst;

CREATE TABLE usuario(
	idUsuario BIGINT(11) NOT NULL AUTO_INCREMENT, 
	nome VARCHAR(60) NOT NULL,
	sobrenome VARCHAR(60) NOT NULL,
	email VARCHAR(40) NOT NULL,
	senha VARCHAR(16) NOT NULL,   
	cpf BIGINT(15) NOT NULL,
	nascimento VARCHAR(10) NOT NULL,
	sexo VARCHAR(10) NOT NULL,
	tipo VARCHAR(5) NOT NULL,
	PRIMARY KEY(idUsuario)
);

CREATE TABLE cupom(
	idCupom BIGINT(8) NOT NULL AUTO_INCREMENT,
	nome VARCHAR(20) NOT NULL,
	desconto INT(5) NOT NULL,
	PRIMARY KEY(idCupom)
);

CREATE TABLE log_produto(
	idLog BIGINT(11) NOT NULL AUTO_INCREMENT,
	tabela VARCHAR(45) NOT NULL,
	usuario VARCHAR(45) NOT NULL,
	data_hora DATETIME NOT NULL,
	acao VARCHAR(45) NOT NULL,
	dados VARCHAR(1000) NOT NULL,
	PRIMARY KEY(idLog)
);

CREATE TABLE categoria(
	idCategoria BIGINT(11) NOT NULL AUTO_INCREMENT,
	nome VARCHAR(30) NOT NULL,
	PRIMARY KEY(idCategoria)
);

CREATE TABLE marca(
	idMarca BIGINT(11) NOT NULL AUTO_INCREMENT,
	nome VARCHAR(20) NOT NULL,
	PRIMARY KEY(idMarca)
);

CREATE TABLE produto(
	idProduto BIGINT(11) NOT NULL AUTO_INCREMENT,
	nome VARCHAR(30) NOT NULL,
	preco DOUBLE NOT NULL,
	categoria BIGINT(11) NOT NULL,
	marca BIGINT(11) NOT NULL,
	descricao VARCHAR(2000) NOT NULL,
	imagem VARCHAR(200) NOT NULL,
	estoque_minimo BIGINT(11) NOT NULL,
	estoque_maximo BIGINT(11) NOT NULL,
	quant_estoque INT NOT NULL,
	cod_barras BIGINT(50) NOT NULL,
	cor VARCHAR(15) NOT NULL,
	tipo_chip VARCHAR(10) NOT NULL,
	quant_chip INT(5) NOT NULL,
	mem_interna VARCHAR(15) NOT NULL,
	mem_ram VARCHAR(15) NOT NULL,
	processador VARCHAR(30) NOT NULL,
	display VARCHAR(10) NOT NULL,
	so VARCHAR(20) NOT NULL,
	PRIMARY KEY(idProduto),
	FOREIGN KEY(categoria) REFERENCES categoria(idCategoria) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY(marca) REFERENCES marca(idMarca) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE endereco(
	idEndereco BIGINT(11) NOT NULL AUTO_INCREMENT,
	idUsuario BIGINT(11) NOT NULL,
	logradouro VARCHAR(50) NOT NULL,
	numero VARCHAR(7) NOT NULL,
	complemento VARCHAR(20),
	bairro VARCHAR(30) NOT NULL,
	cidade VARCHAR(30) NOT NULL,
	cep VARCHAR(9) NOT NULL,
	PRIMARY KEY(idEndereco),
	FOREIGN KEY(idUsuario) REFERENCES usuario(idUsuario) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE FormaPagamento(
	idFormaPagamento BIGINT NOT NULL AUTO_INCREMENT,
	nome VARCHAR(45) NOT NULL,
	PRIMARY KEY(idFormaPagamento)
);

CREATE TABLE pedido (
	idPedido BIGINT(11) NOT NULL AUTO_INCREMENT,
	idUsuario BIGINT(11) NOT NULL,
	idFormaPagamento BIGINT NOT NULL,
	dataCompra DATE NOT NULL,
	PRIMARY KEY(idPedido),
	FOREIGN KEY(idUsuario) REFERENCES usuario(idUsuario) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY(idFormaPagamento) REFERENCES FormaPagamento(idFormaPagamento) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE pedido_produto(
	idPedido BIGINT(11) NOT NULL,
	idProduto BIGINT(11) NOT NULL,
	quantidade INT(5) NOT NULL,
	PRIMARY KEY(idProduto, idPedido),
	FOREIGN KEY(idProduto) REFERENCES produto(idProduto) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY(idPedido) REFERENCES pedido(idPedido) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE estoque(
	idEstoque BIGINT(11) NOT NULL AUTO_INCREMENT,
	idProduto BIGINT(11) NOT NULL,
	quantidade INT(8) NOT NULL,
	PRIMARY KEY(idEstoque),
	FOREIGN KEY(idProduto) REFERENCES produto(idProduto) ON DELETE CASCADE ON UPDATE CASCADE
);


-- INSERÇÃO DOS ADMINISTRADORES DO SISTEMA

INSERT INTO usuario VALUES(
	NULL,
	"Samuel",
	"Facchetti de Matos",
	"s.facchetti@aluno.ifsp.edu.br",
	"SaLe23091976",
	47380334840,
	"2002-09-16",
	"Masculino",
	"admin"
);

INSERT INTO usuario VALUES(
	NULL,
	"Thiago",
	"Almeida Maciel",
	"thiago.maciel@aluno.ifsp.edu.br",
	"Thiago160103",
	52535138840,
	"2003-01-16",
	"Masculino",
	"admin"
);

INSERT INTO produto VALUES (NULL,
        "Moto G",
        999.99,
        1,
        1,
        "Bonito",
        "lala.jpg",
        1, 
        2,
        10,
        12345689,
        "preto",
        "nano",
        3,
        "64GB",
        "4GB",
        "snapdragon",
        "5.7",
        "android"
    );


-- AULA 12 GBD, MANIPULAÇÃO DE ARQUIVOS PW2
