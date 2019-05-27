-- DROP DATABASE electronicsst;
-- CREATE DATABASE electronicsst;

-- USE electronicsst;

-- CREATE TABLE IF NOT EXISTS 'usuario' (
-- 	id INT(11) NOT NULL AUTO_INCREMENT,
-- 	nome VARCHAR(100) NOT NULL,
-- 	senha VARCHAR(100) NOT NULL,
-- 	email VARCHAR(100) NOT NULL,
-- 	papel VARCHAR(100) NOT NULL DEFAULT 'usuario',
-- 	PRIMARY KEY (id)
-- );

create table cliente(
	email varchar(50) NOT NULL,
	senha varchar(20) NOT NULL,
	CPF varchar(14) NOT NULL,
	Nome varchar(30) NOT NULL,
	Sobrenome varchar(60) NOT NULL,
	dataNasc DATE NOT NULL,
	sexo varchar(9) NOT NULL,
	telefone varchar(20) NOT NULL,
	primary key(CPF)
 );

create table produto(
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
	primary key(codProduto)
);

create table categoria(
	idCategoria varchar(15) NOT NULL,
	idProduto int(11) NOT NULL,
	primary key(idCategoria),
	foreign key(idProduto) REFERENCES produto(codProduto) ON UPDATE CASCADE ON DELETE CASCADE
);


--ENGINE = InnoDB
--AUTO_INCREMENT = 24
--DEFAULT CHARACTER SET = utf8

--INSERT INTO 'mvcd'.'usuario' ('nome', 'senha', 'email', 'papel') VALUES ('admin', '123', 'admin@admin', 'admin');
--INSERT INTO 'mvcd'.'usuario' ('nome', 'senha', 'email', 'papel') VALUES ('usuario', '123', 'usuario@usuario', 'usuario');
