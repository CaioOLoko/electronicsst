--Criação e Definição da Base de Dados
DROP DATABASE IF EXISTS electronicsst;
CREATE DATABASE electronicsst;
USE electronicsst;

--Criação das Tabelas
CREATE TABLE IF NOT EXISTS usuario(
	idusuario INT(11) NOT NULL AUTO_INCREMENT,
	nomeusuario VARCHAR(60) NOT NULL,
	email VARCHAR(60) NOT NULL,
	senha VARCHAR(30) NOT NULL,
	cpf VARCHAR(14) NOT NULL,
	datadenascimento VARCHAR(10) NOT NULL,
	sexo VARCHAR(10) NOT NULL,
	tipousuario VARCHAR(15) NOT NULL,
	PRIMARY KEY(idusuario)
);
create table categoria(
	idCategoria INT(15) NOT NULL AUTO_INCREMENT,
        descricao varchar(30) NOT NULL,
	primary key(idCategoria)
);
CREATE TABLE IF NOT EXISTS produto(
	idproduto INT(11) NOT NULL AUTO_INCREMENT,
        idcategoria varchar(15) NOT NULL,
	preco DOUBLE NOT NULL,
	nomeproduto VARCHAR(30) NOT NULL,
	descricao VARCHAR(60) NOT NULL,
	imagem VARCHAR(60) NOT NULL,
	estoque_minimo INT(11) NOT NULL,
	estoque_maximo INT(11) NOT NULL,
	PRIMARY KEY(idproduto),
        FOREIGN KEY(idcategoria) REFERENCES categoria(idcategoria) ON UPDATE CASCADE ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS endereco(
	idEndereco INT(11) NOT NULL AUTO_INCREMENT,
	idUsuario INT (11) NOT NULL,
	Logradouro VARCHAR(20) NOT NULL,
	Complemento VARCHAR(20),
	Bairro VARCHAR(30) NOT NULL,
	Cidade VARCHAR(30) NOT NULL,
	CEP VARCHAR(8) NOT NULL,
	PRIMARY KEY(idEndereco, idUsuario),
	FOREIGN KEY(idUsuario) REFERENCES usuario(idUsuario) ON UPDATE CASCADE ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS cupom(
	idCupom INT(8) NOT NULL AUTO_INCREMENT,
	NomeCupom VARCHAR(20) NOT NULL,
	Desconto INT(8) NOT NULL,
	PRIMARY KEY(idCupom)
);
CREATE TABLE IF NOT EXISTS log_produto(
	ID_Log INT(11) NOT NULL AUTO_INCREMENT,
	Tabela VARCHAR(45) NOT NULL,
	Usuario VARCHAR(45) NOT NULL,
	Data_Hora DATETIME NOT NULL,
	Acao VARCHAR(45) NOT NULL,
	Dados VARCHAR(1000) NOT NULL,
	PRIMARY KEY(ID_Log)
);
CREATE TABLE IF NOT EXISTS  pedido (
	idPedido INT(11) NOT NULL AUTO_INCREMENT,
	idUsuario INT(11) NOT NULL,
	idEndereco INT(11) NOT NULL,
	dataCompra DATE NOT NULL,
	PRIMARY KEY(idPedido),
	FOREIGN KEY(idUsuario) REFERENCES usuario(idUsuario) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY(idEndereco) REFERENCES endereco(idEndereco) ON UPDATE CASCADE ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS pedido_produto(
	idProduto INT(11) NOT NULL,
	idPedido INT(11) NOT NULL,
	Quantidade INT(11) NOT NULL,
	PRIMARY KEY(idProduto, idPedido),
	FOREIGN KEY(idProduto) REFERENCES produto(idProduto) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY(idPedido) REFERENCES pedido(idPedido) ON UPDATE CASCADE ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS estoque(
	idEstoque INT(11) NOT NULL AUTO_INCREMENT,
	idProduto INT(11) NOT NULL,
	Quantidade INT(11) NOT NULL,
	PRIMARY KEY(idEstoque),
	FOREIGN KEY(idProduto) REFERENCES produto(idProduto) ON UPDATE CASCADE ON DELETE CASCADE
);


/*create table produto(
	codProduto int(11) NOT NULL,
	categoria varchar(20) NOT NULL,
	nome varchar(30) NOT NULL,
	valUnit double NOT NULL,
	infoProduto varchar(200) NOT NULL,
	codDeBarras varchar(15) NOT NULL,
	marca varchar(20) NOT NULL,
	modelo varchar(50) NOT NULL,
	cor varchar(20) NOT NULL,
	memoria varchar(10) NOT NULL,
	processador varchar(30) NOT NULL,
	PolegadaTela varchar(6) NOT NULL,
	SistOper varchar(15) NOT NULL,
	primary key(codProduto),
	foreign key(categoria) REFERENCES categoria(idCategoria) ON UPDATE CASCADE ON DELETE CASCADE
);


ENGINE = InnoDB
AUTO_INCREMENT = 24
DEFAULT CHARACTER SET = utf8

INSERT INTO  mvcd . usuario  ( nome ,  senha ,  email ,  papel ) VALUES ( admin ,  123 ,  admin@admin ,  admin );
INSERT INTO  mvcd . usuario  ( nome ,  senha ,  email ,  papel ) VALUES ( usuario ,  123 ,  usuario@usuario ,  usuario );
*/