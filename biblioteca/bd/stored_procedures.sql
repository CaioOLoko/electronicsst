-- -- < - <  ADICIONAR  > - > -- --
	-- Usuario
		DROP PROCEDURE IF EXISTS sp_addUsuario;
		DELIMITER $$
			CREATE PROCEDURE sp_addUsuario (
				v_nome VARCHAR(60), 
				v_sobrenome VARCHAR(60), 
				v_email VARCHAR(40), 
				v_senha VARCHAR(16), 
				v_cpf BIGINT(15), 
				v_nascimento VARCHAR(10), 
				v_sexo VARCHAR(10), 
				v_tipo VARCHAR(5)
			)
			BEGIN
				INSERT INTO usuario
				VALUES (
					NULL, 
					v_nome, 
					v_sobrenome, 
					v_email, 
					v_senha, 
					v_cpf, 
					v_nascimento, 
					v_sexo, 
					v_tipo
				);
			END; $$
		DELIMITER ;

	-- Cupom
		DROP PROCEDURE IF EXISTS sp_addCupom;
		DELIMITER $$
			CREATE PROCEDURE sp_addCupom (
				v_nome VARCHAR(20),
				v_desconto INT(5)
			)
			BEGIN
				INSERT INTO cupom 
				VALUES (
					NULL, 
					v_nome, 
					v_desconto
				);
			END; $$
		DELIMITER ;

	-- Categoria
		DROP PROCEDURE IF EXISTS sp_addCategoria;
		DELIMITER $$
			CREATE PROCEDURE sp_addCategoria (
				v_nome VARCHAR(30)
			)
			BEGIN
				INSERT INTO categoria 
				VALUES (
					NULL, 
					v_nome
				);
			END; $$
		DELIMITER ;

	-- Marca
		DROP PROCEDURE IF EXISTS sp_addMarca;
		DELIMITER $$
			CREATE PROCEDURE sp_addMarca (
				v_nome VARCHAR(20)
			)
			BEGIN
				INSERT INTO marca 
				VALUES (
					NULL, 
					v_nome
				);
			END; $$
		DELIMITER ;

	-- Produto
		DROP PROCEDURE IF EXISTS sp_addProduto;
		DELIMITER $$
			CREATE PROCEDURE sp_addProduto (
				v_nome VARCHAR(40),
				v_preco VARCHAR(10),
				v_categoria BIGINT(11),
				v_marca BIGINT(11),
				v_descricao VARCHAR(2000),
				v_imagem VARCHAR(200),
				v_estoque_minimo BIGINT(11),
				v_estoque_maximo BIGINT(11),
				v_quant_estoque BIGINT(11)
			)
			BEGIN
				INSERT INTO produto 
				VALUES (
					NULL,
					v_nome,
					v_preco,
					v_categoria,
					v_marca,
					v_descricao,
					v_imagem,
					v_estoque_minimo,
					v_estoque_maximo,
					v_quant_estoque
				);
			END; $$
		DELIMITER ;

	-- Endereco
		DROP PROCEDURE IF EXISTS sp_addEndereco;
		DELIMITER $$
			CREATE PROCEDURE sp_addEndereco (
				v_idUsuario BIGINT(11),
				v_logradouro VARCHAR(50),
				v_numero VARCHAR(7),
				v_complemento VARCHAR(20),
				v_bairro VARCHAR(30),
				v_cidade VARCHAR(30),
				v_cep VARCHAR(9)
			)
			BEGIN
				INSERT INTO endereco 
				VALUES (
					NULL,
					v_idUsuario,
					v_logradouro,
					v_numero,
					v_complemento,
					v_bairro,
					v_cidade,
					v_cep
				);
			END; $$
		DELIMITER ;

	-- Forma de Pagamento
		DROP PROCEDURE IF EXISTS sp_addPagamento;
		DELIMITER $$
			CREATE PROCEDURE sp_addPagamento (
				v_nome VARCHAR(45)
			)
			BEGIN
				INSERT INTO FormaPagamento 
				VALUES (
					NULL, 
					v_nome
				);
			END; $$
		DELIMITER ;

	-- Pedido
		DROP PROCEDURE IF EXISTS sp_addPedido;
		DELIMITER $$
			CREATE PROCEDURE sp_addPedido (
				v_idUsuario BIGINT(11),
				v_idFormaPagamento BIGINT(11),
				v_dataCompra DATE
			)
			BEGIN
				INSERT INTO pedido 
				VALUES (
					NULL,
					v_idUsuario,
					v_idFormaPagamento,
					v_dataCompra
				);
			END; $$
		DELIMITER ;

	-- Pedido Produto
		DROP PROCEDURE IF EXISTS sp_addPedidoProduto;
		DELIMITER $$
			CREATE PROCEDURE sp_addPedidoProduto (
				v_idPedido BIGINT(11),
				v_idProduto BIGINT(11),
				v_quantidade INT(5)
			)
			BEGIN
				INSERT INTO pedido_produto 
				VALUES (
					v_idPedido,
					v_idProduto,
					v_quantidade
				);
			END; $$
		DELIMITER ;

-- -- < - <    EDITAR   > - > -- --
	-- Usuario
		DROP PROCEDURE IF EXISTS sp_updUsuario;
		DELIMITER $$
			CREATE PROCEDURE sp_updUsuario (
				v_idUsuario INT, 
				v_nome VARCHAR(60), 
				v_sobrenome VARCHAR(60), 
				v_email VARCHAR(40), 
				v_senha VARCHAR(16), 
				v_cpf BIGINT(15), 
				v_nascimento VARCHAR(10), 
				v_sexo VARCHAR(10)
			)
			BEGIN
				UPDATE usuario 
				SET nome =			v_nome, 
					sobrenome =		v_sobrenome, 
					email = 		v_email, 
					senha =			v_senha, 
					cpf =			v_cpf,
					nascimento = 	v_nascimento,
					sexo = 			v_sexo 
				WHERE idUsuario = v_idUsuario;
			END; $$
		DELIMITER ;

	-- Cupom
		DROP PROCEDURE IF EXISTS sp_updCupom;
		DELIMITER $$
			CREATE PROCEDURE sp_updCupom (
				v_idCupom BIGINT(8),
				v_nome VARCHAR(20),
				v_desconto INT(5)
			)
			BEGIN
				UPDATE cupom 
				SET nome = 		v_nome, 
					desconto = 	v_desconto
				WHERE idCupom = v_idCupom;
			END; $$
		DELIMITER ;

	-- Categoria
		DROP PROCEDURE IF EXISTS sp_updCategoria;
		DELIMITER $$
			CREATE PROCEDURE sp_updCategoria (
				v_idCategoria BIGINT(11),
				v_nome VARCHAR(30)
			)
			BEGIN
				UPDATE categoria 
				SET nome = v_nome 
				WHERE idCategoria = v_idCategoria;
			END; $$
		DELIMITER ;

	-- Marca
		DROP PROCEDURE IF EXISTS sp_updMarca;
		DELIMITER $$
			CREATE PROCEDURE sp_updMarca (
				v_idMarca BIGINT(11),
				v_nome VARCHAR(20)
			)
			BEGIN
				UPDATE marca 
				SET 	nome = v_nome
				WHERE idMarca = v_idMarca;
			END; $$
		DELIMITER ;

	-- Produto
		DROP PROCEDURE IF EXISTS sp_updProduto;
		DELIMITER $$
			CREATE PROCEDURE sp_updProduto (
				v_idProduto BIGINT(11),
				v_nome VARCHAR(40),
				v_preco VARCHAR(10),
				v_categoria BIGINT(11),
				v_marca BIGINT(11),
				v_descricao VARCHAR(2000),
				v_imagem VARCHAR(200),
				v_estoque_minimo BIGINT(11),
				v_estoque_maximo BIGINT(11),
				v_quant_estoque BIGINT(11)
			)
			BEGIN
				UPDATE produto 
				SET nome = 				v_nome,
					preco = 			v_preco,
					categoria = 		v_categoria,
					marca = 			v_marca,
					descricao = 		v_descricao,
					imagem = 			v_imagem,
					estoque_minimo = 	v_estoque_minimo,
					estoque_maximo =	v_estoque_maximo,
					quant_estoque = 	v_quant_estoque 
				WHERE idProduto = v_idProduto;
			END; $$
		DELIMITER ;

	-- Endereco
		DROP PROCEDURE IF EXISTS sp_updEndereco;
		DELIMITER $$
			CREATE PROCEDURE sp_updEndereco (
				v_idEndereco BIGINT(11),
				v_logradouro VARCHAR(50),
				v_numero VARCHAR(7),
				v_complemento VARCHAR(20),
				v_bairro VARCHAR(30),
				v_cidade VARCHAR(30),
				v_cep VARCHAR(9)
			)
			BEGIN
				UPDATE endereco 
				SET logradouro = 	v_logradouro,
					numero = 		v_numero,
					complemento = 	v_complemento,
					bairro = 		v_bairro,
					cidade = 		v_cidade,
					cep = 			v_cep 
				WHERE idEndereco = v_idEndereco;
			END; $$
		DELIMITER ;

	-- Forma de Pagamento
		DROP PROCEDURE IF EXISTS sp_updPagamento;
		DELIMITER $$
			CREATE PROCEDURE sp_updPagamento (
				v_idPagamento BIGINT,
				v_nome VARCHAR(45)
			)
			BEGIN
				UPDATE FormaPagamento 
				SET nome = v_nome 
				WHERE idFormaPagamento = v_idPagamento;
			END; $$
		DELIMITER ;

-- -- < - <   DELETAR   > - > -- --
	-- Usuario
		DROP PROCEDURE IF EXISTS sp_delUsuario;
		DELIMITER $$
			CREATE PROCEDURE sp_delUsuario (v_idUsuario BIGINT(11))
			BEGIN
				DELETE FROM usuario
				WHERE idUsuario = v_idUsuario;
			END; $$
		DELIMITER ;

	-- Cupom
		DROP PROCEDURE IF EXISTS sp_delCupom;
		DELIMITER $$
			CREATE PROCEDURE sp_delCupom (v_idCupom BIGINT(8))
			BEGIN
				DELETE FROM cupom 
				WHERE idCupom = v_idCupom;
			END; $$
		DELIMITER ;

	-- Categoria
		DROP PROCEDURE IF EXISTS sp_delCategoria;
		DELIMITER $$
			CREATE PROCEDURE sp_delCategoria (v_idCategoria BIGINT(11))
			BEGIN
				DELETE FROM categoria 
				WHERE idCategoria = v_idCategoria;
			END; $$
		DELIMITER ;

	-- Marca
		DROP PROCEDURE IF EXISTS sp_delMarca;
		DELIMITER $$
			CREATE PROCEDURE sp_delMarca (v_idMarca BIGINT(11))
			BEGIN
				DELETE FROM marca 
				WHERE idMarca = v_idMarca;
			END; $$
		DELIMITER ;

	-- Produto
		DROP PROCEDURE IF EXISTS sp_delProduto;
		DELIMITER $$
			CREATE PROCEDURE sp_delProduto (v_idProduto BIGINT(11))
			BEGIN
				DELETE FROM produto 
				WHERE idProduto = v_idProduto;
			END; $$
		DELIMITER ;

	-- Endereco
		DROP PROCEDURE IF EXISTS sp_delEndereco;
		DELIMITER $$
			CREATE PROCEDURE sp_delEndereco (v_idEndereco BIGINT(11))
			BEGIN
				DELETE FROM endereco 
				WHERE idEndereco = v_idEndereco;
			END; $$
		DELIMITER ;

	-- Forma de Pagamento
		DROP PROCEDURE IF EXISTS sp_delPagamento;
		DELIMITER $$
			CREATE PROCEDURE sp_delPagamento (v_idPagamento BIGINT(11))
			BEGIN
				DELETE FROM FormaPagamento 
				WHERE idFormaPagamento = v_idPagamento;
			END; $$
		DELIMITER ;

-- -- < - <  VISUALIZAR > - > -- --
	-- Usuario
		DROP PROCEDURE IF EXISTS sp_selUsuario;
		DELIMITER $$
			CREATE PROCEDURE sp_selUsuario (v_idUsuario BIGINT(11))
			BEGIN
				SELECT * 
				FROM usuario 
				WHERE idUsuario = v_idUsuario;
			END; $$
		DELIMITER ;

	-- Cupom
		DROP PROCEDURE IF EXISTS sp_selCupom;
		DELIMITER $$
			CREATE PROCEDURE sp_selCupom (v_idCupom BIGINT(11))
			BEGIN
				SELECT * 
				FROM cupom 
				WHERE v_idCupom = v_idCupom;
			END; $$
		DELIMITER ;

	-- Categoria
		DROP PROCEDURE IF EXISTS sp_selCategoria;
		DELIMITER $$
			CREATE PROCEDURE sp_selCategoria (v_idCategoria BIGINT(11))
			BEGIN
				SELECT c.*, COUNT(p.idProduto) AS quantidade 
				FROM categoria c 
				INNER JOIN produto p 
				ON c.idCategoria = p.categoria 
				WHERE c.idCategoria = v_idCategoria;
			END; $$
		DELIMITER ;

	-- Marca
		DROP PROCEDURE IF EXISTS sp_selMarca;
		DELIMITER $$
			CREATE PROCEDURE sp_selMarca (v_idMarca BIGINT(11))
			BEGIN
				SELECT * 
				FROM marca 
				WHERE idMarca = v_idMarca;
			END; $$
		DELIMITER ;

	-- Produto
		DROP PROCEDURE IF EXISTS sp_selProduto;
		DELIMITER $$
			CREATE PROCEDURE sp_selProduto (v_idProduto BIGINT(11))
			BEGIN
				SELECT p.*, c.nome AS categoria, m.nome AS marca 
				FROM produto p 
				INNER JOIN categoria c
				ON p.categoria = c.idCategoria 
				INNER JOIN marca m 
				ON p.marca = m.idMarca 
				WHERE idProduto = v_idProduto;
			END; $$
		DELIMITER ;

	-- Endereco
		DROP PROCEDURE IF EXISTS sp_selEndereco;
		DELIMITER $$
			CREATE PROCEDURE sp_selEndereco (v_idEndereco BIGINT(11))
			BEGIN
				SELECT * 
				FROM endereco 
				WHERE idEndereco = v_idEndereco;
			END; $$
		DELIMITER ;

	-- Pagamento
		DROP PROCEDURE IF EXISTS sp_selPagamento;
		DELIMITER $$
			CREATE PROCEDURE sp_selPagamento (v_idPagamento BIGINT(11))
			BEGIN
				SELECT * 
				FROM FormaPagamento 
				WHERE idFormaPagamento = v_idPagamento;
			END; $$
		DELIMITER ;

	-- Pedido
		DROP PROCEDURE IF EXISTS sp_selPedido;
		DELIMITER $$
			CREATE PROCEDURE sp_selPedido (v_idPedido BIGINT(11))
			BEGIN
				SELECT * 
				FROM pedido 
				WHERE idPedido = v_idPedido;
			END; $$
		DELIMITER ;

	-- Pedido Produto
		DROP PROCEDURE IF EXISTS sp_selPedidoProduto;
		DELIMITER $$
			CREATE PROCEDURE sp_selPedidoProduto (v_idPedido BIGINT(11))
			BEGIN
				SELECT * 
				FROM pedido_produto 
				WHERE idPedido = v_idPedido;
			END; $$
		DELIMITER ;

	-- LogProduto
		DROP PROCEDURE IF EXISTS sp_selLogProduto;
		DELIMITER $$
			CREATE PROCEDURE sp_selLogProduto (v_idLog BIGINT(11))
			BEGIN
				SELECT * 
				FROM log_produto 
				WHERE idLog = v_idLog;
			END; $$
		DELIMITER ;

	-- Estoque
		DROP PROCEDURE IF EXISTS sp_selEstoque;
		DELIMITER $$
			CREATE PROCEDURE sp_selEstoque (v_idEstoque BIGINT(11))
			BEGIN
				SELECT * 
				FROM log_estoque 
				WHERE idEstoque = v_idEstoque;
			END; $$
		DELIMITER ;

-- -- < - <   LISTAR    > - > -- --
	-- Usuarios
		DROP PROCEDURE IF EXISTS sp_TodosUsuarios;
		DELIMITER $$
			CREATE PROCEDURE sp_TodosUsuarios (v_tipo VARCHAR(10))
			BEGIN
				IF (v_tipo = '') THEN
					SELECT *
					FROM usuario 
					ORDER BY tipo, idUsuario ASC;
				ELSE
					SELECT *
					FROM usuario
					ORDER BY v_tipo;
				END IF;
			END; $$
		DELIMITER ;

	-- Cupons
		DROP PROCEDURE IF EXISTS sp_TodosCupons;
		DELIMITER $$
			CREATE PROCEDURE sp_TodosCupons ()
			BEGIN
				SELECT *
				FROM cupom 
				ORDER BY idCupom ASC;
			END; $$
		DELIMITER ;

	-- Categorias
		DROP PROCEDURE IF EXISTS sp_TodasCategorias;
		DELIMITER $$
			CREATE PROCEDURE sp_TodasCategorias ()
			BEGIN
				SELECT *
				FROM categoria 
				ORDER BY nome ASC;
			END; $$
		DELIMITER ;

	-- Marcas
		DROP PROCEDURE IF EXISTS sp_TodasMarcas;
		DELIMITER $$
			CREATE PROCEDURE sp_TodasMarcas ()
			BEGIN
				SELECT *
				FROM marca 
				ORDER BY nome ASC;
			END; $$
		DELIMITER ;

	-- Produtos
		DROP PROCEDURE IF EXISTS sp_TodosProdutos;
		DELIMITER $$
			CREATE PROCEDURE sp_TodosProdutos ()
			BEGIN
				SELECT *
				FROM produto 
				ORDER BY nome ASC;
			END; $$
		DELIMITER ;

	-- Enderecos
		DROP PROCEDURE IF EXISTS sp_TodosEnderecos;
		DELIMITER $$
			CREATE PROCEDURE sp_TodosEnderecos ()
			BEGIN
				SELECT *
				FROM endereco 
				ORDER BY idUsuario, logradouro ASC;
			END; $$
		DELIMITER ;

	-- Pagamentos
		DROP PROCEDURE IF EXISTS sp_TodosPagamentos;
		DELIMITER $$
			CREATE PROCEDURE sp_TodosPagamentos ()
			BEGIN
				SELECT *
				FROM FormaPagamento 
				ORDER BY nome ASC;
			END; $$
		DELIMITER ;

	-- Pedidos
		DROP PROCEDURE IF EXISTS sp_TodosPedidos;
		DELIMITER $$
			CREATE PROCEDURE sp_TodosPedidos ()
			BEGIN
				SELECT p.*, u.nome AS usuario, fp.nome AS pagamento, COUNT(pp.idProduto) AS quantidadeProdutos 
				FROM pedido p 
				INNER JOIN FormaPagamento fp 
				ON p.idFormaPagamento = fp.idFormaPagamento 
				INNER JOIN usuario u 
				ON p.idUsuario = u.idUsuario 
				INNER JOIN pedido_produto pp 
				ON p.idPedido = pp.idPedido 
				ORDER BY dataCompra ASC;
			END; $$
		DELIMITER ;

	-- LogProdutos
		DROP PROCEDURE IF EXISTS sp_TodosLogProutos;
		DELIMITER $$
			CREATE PROCEDURE sp_TodosLogProutos ()
			BEGIN
				SELECT *
				FROM log_produto 
				ORDER BY data_hora ASC;
			END; $$
		DELIMITER ;

-- -- < - <   OUTROS    > - > -- --
	-- Usuario para Adm
		DROP PROCEDURE IF EXISTS sp_UsuarioToAdm;
		DELIMITER $$
			CREATE PROCEDURE sp_UsuarioToAdm(v_idUsuario INT)
			BEGIN
				UPDATE usuario 
				SET tipo = 'admin' 
				WHERE idUsuario = v_idUsuario;
			END; $$
		DELIMITER ;

	-- Usuario por Email e Senha
		DROP PROCEDURE IF EXISTS sp_UsuarioByEmailSenha;
		DELIMITER $$
			CREATE PROCEDURE sp_UsuarioByEmailSenha (
				v_email VARCHAR(40), 
				v_senha VARCHAR(16)
			)
			BEGIN
				SELECT * 
				FROM usuario 
				WHERE email = v_email AND senha = v_senha;
			END; $$
		DELIMITER ;

	-- Enderecos por Usuario
		DROP PROCEDURE IF EXISTS sp_EnderecosByUsuario;
		DELIMITER $$
			CREATE PROCEDURE sp_EnderecosByUsuario (v_idUsuario BIGINT(11))
			BEGIN
				SELECT *
				FROM endereco 
				WHERE idUsuario = v_idUsuario
				ORDER BY logradouro ASC;
			END; $$
		DELIMITER ;

	-- Deletar Enderecos por Usuario
		DROP PROCEDURE IF EXISTS sp_delEnderecosByUsuario;
		DELIMITER $$
			CREATE PROCEDURE sp_delEnderecosByUsuario (v_idUsuario BIGINT(11))
			BEGIN
				DELETE FROM endereco 
				WHERE idUsuario = v_idUsuario;
			END; $$
		DELIMITER ;

	-- Pedidos por Usuario
		DROP PROCEDURE IF EXISTS sp_PedidosByUsuario;
		DELIMITER $$
			CREATE PROCEDURE sp_PedidosByUsuario (v_idUsuario BIGINT(11))
			BEGIN
				SELECT * 
				FROM pedido
				WHERE idUsuario = v_idUsuario
				ORDER BY dataCompra;
			END; $$
		DELIMITER ;

	-- Pedidos por dataCompra
		DROP PROCEDURE IF EXISTS sp_PedidosByDataCompra;
		DELIMITER $$
			CREATE PROCEDURE sp_PedidosByDataCompra (v_dataCompra DATE)
			BEGIN
				SELECT * 
				FROM pedido 
				WHERE dataCompra = v_dataCompra;
			END; $$
		DELIMITER ;

	-- Pedidos por Cidade
		DROP PROCEDURE IF EXISTS sp_PedidosPorCidade;
		DELIMITER $$
			CREATE PROCEDURE sp_PedidosPorCidade (v_cidade VARCHAR(30))
			BEGIN
				SELECT pedido.*
				FROM pedido
				INNER JOIN usuario
				ON pedido.idUsuario = usuario.idUsuario
				INNER JOIN endereco
				ON usuario.idUsuario = endereco.idUsuario
				WHERE endereco.cidade = v_cidade;
			END; $$
		DELIMITER ;

	-- Produto por Nome
		DROP PROCEDURE IF EXISTS sp_ProdutoByNome;
		DELIMITER $$
			CREATE PROCEDURE sp_ProdutoByNome (v_nome VARCHAR(40))
			BEGIN
				SELECT *
				FROM produto
				WHERE nome LIKE v_nome;
			END; $$
		DELIMITER ;

	-- Produto por Categoria
		DROP PROCEDURE IF EXISTS sp_ProdutoByCategoria;
		DELIMITER $$
			CREATE PROCEDURE sp_ProdutoByCategoria (v_categoria BIGINT(11))
			BEGIN
				SELECT *
				FROM produto
				WHERE categoria = v_categoria;
			END; $$
		DELIMITER ;

	-- Produto por Marca
		DROP PROCEDURE IF EXISTS sp_ProdutoByMarca;
		DELIMITER $$
			CREATE PROCEDURE sp_ProdutoByMarca (v_marca BIGINT(11))
			BEGIN
				SELECT *
				FROM produto
				WHERE marca = v_marca;
			END; $$
		DELIMITER ;

	-- Marca por Nome
		DROP PROCEDURE IF EXISTS sp_MarcaByNome;
		DELIMITER $$
			CREATE PROCEDURE sp_MarcaByNome (v_nome VARCHAR(20))
			BEGIN
				SELECT *
				FROM marca 
				WHERE nome = v_nome;
			END; $$
		DELIMITER ;

	-- Categoria por Nome
		DROP PROCEDURE IF EXISTS sp_CategoriaByNome;
		DELIMITER $$
			CREATE PROCEDURE sp_CategoriaByNome (v_nome VARCHAR(30))
			BEGIN 
				SELECT *
				FROM categoria 
				WHERE nome = v_nome;
			END; $$
		DELIMITER ;

	-- Desconto por Nome
		DROP PROCEDURE IF EXISTS sp_DescontoByNome;
		DELIMITER $$
			CREATE PROCEDURE sp_DescontoByNome (v_nome VARCHAR(20))
			BEGIN
				SELECT desconto
				FROM cupom
				WHERE nome = v_nome;
			END; $$
		DELIMITER ;

	-- IdMarca por Nome
		DROP PROCEDURE IF EXISTS sp_IdMarcaByNome;
		DELIMITER $$
			CREATE PROCEDURE sp_IdMarcaByNome (v_nome VARCHAR(20))
			BEGIN
				SELECT idMarca
				FROM marca 
				WHERE nome = v_nome;
			END; $$
		DELIMITER ;

	-- IdCategoria por Nome
		DROP PROCEDURE IF EXISTS sp_IdCategoriaByNome;
		DELIMITER $$
			CREATE PROCEDURE sp_IdCategoriaByNome (v_nome VARCHAR(30))
			BEGIN
				SELECT idCategoria 
				FROM categoria 
				WHERE nome = v_nome;
			END; $$
		DELIMITER ;

-- -- < - <      :      > - > -- --