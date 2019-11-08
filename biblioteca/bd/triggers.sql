-- Update quantidade do produto pós-venda
	DROP TRIGGER IF EXISTS tr_attQuantProduto;
	DELIMITER $$
		CREATE TRIGGER tr_attQuantProduto
		AFTER INSERT ON pedido_produto
		FOR EACH ROW
		BEGIN
			UPDATE produto 
			SET quant_estoque = quant_estoque - NEW.quantidade
			WHERE produto.idProduto = NEW.idProduto;
		END;$$
	DELIMITER ;

-- Insert Produto
	DROP TRIGGER IF EXISTS tr_addLogProduto;
	DELIMITER $$
		CREATE TRIGGER tr_addLogProduto
		AFTER INSERT ON produto
		FOR EACH ROW
		BEGIN
			SET @dadosAntigos = CONCAT(
				'ID:    		  # ', 
				'Nome:   		  # ', 
				'Preço:   	 	  # ', 
				'Categoria:    	  # ', 
				'Marca:   	 	  # ', 
				'Descricao:       # ', 
				'Image:   	 	  # ', 
				'Estoque_Min:     # ', 
				'Estoque_Max:     # ', 
				'Quantidade:      # '
			);

			SET @dadosNovos = CONCAT(
				'ID: ', 			NEW.idProduto, 		' # ', 
				'Nome: ',			NEW.nome, 			' # ', 
				'Preço: ',			NEW.preco, 			' # ', 
				'Categoria: ',		NEW.categoria, 		' # ', 
				'Marca: ',			NEW.marca, 			' # ', 
				'Descricao: ',		NEW.descricao, 		' # ', 
				'Image: ',			NEW.imagem, 		' # ', 
				'Estoque_Min: ',	NEW.estoque_minimo, ' # ', 
				'Estoque_Max: ',	NEW.estoque_maximo, ' # ', 
				'Quantidade: ',		NEW.quant_estoque, 	' # '
			);

			SET @DataProduto = SYSDATE();

			SET @usuario = CURRENT_USER();
			
			INSERT INTO log_produto 
			VALUES (
				NULL, 
				"Produto",
				@usuario, 
				@DataProduto, 
				"INSERT", 
				@dadosAntigos,
				@dadosNovos
			);
		END;$$
	DELIMITER ;

-- Update Produto
	DROP TRIGGER IF EXISTS tr_uptLogProduto;
	DELIMITER $$
		CREATE TRIGGER tr_uptLogProduto
		AFTER UPDATE ON produto
		FOR EACH ROW
		BEGIN
			SET @dadosAntigos = CONCAT(
				'ID: ', 			OLD.idProduto, 		' # ', 
				'Nome: ',			OLD.nome, 			' # ', 
				'Preço: ',			OLD.preco, 			' # ', 
				'Categoria: ',		OLD.categoria, 		' # ', 
				'Marca: ',			OLD.marca, 			' # ', 
				'Descricao: ',		OLD.descricao, 		' # ', 
				'Image: ',			OLD.imagem, 		' # ', 
				'Estoque_Min: ',	OLD.estoque_minimo, ' # ', 
				'Estoque_Max: ',	OLD.estoque_maximo, ' # ', 
				'Quantidade: ',		OLD.quant_estoque, 	' # '
			);

			SET @dadosNovos = CONCAT(
				'  ID: ', 			NEW.idProduto, 		' # ', 
				'Nome: ',			NEW.nome, 			' # ', 
				'Preço: ',			NEW.preco, 			' # ', 
				'Categoria: ',		NEW.categoria, 		' # ', 
				'Marca: ',			NEW.marca, 			' # ', 
				'Descricao: ',		NEW.descricao, 		' # ', 
				'Image: ',			NEW.imagem, 		' # ', 
				'Estoque_Min: ',	NEW.estoque_minimo, ' # ', 
				'Estoque_Max: ',	NEW.estoque_maximo, ' # ', 
				'Quantidade: ',		NEW.quant_estoque, 	' # '
			);

			SET @DataProduto = SYSDATE();

			SET @usuario = CURRENT_USER();

			INSERT INTO log_produto 
			VALUES (
				NULL, 
				"Produto",
				@usuario, 
				@DataProduto, 
				"UPDATE", 
				@dadosAntigos, 
				@dadosNovos
			);
		END;$$
	DELIMITER ;

-- Delete Produto
	DROP TRIGGER IF EXISTS tr_remLogProduto;
	DELIMITER $$
		CREATE TRIGGER tr_remLogProduto
		AFTER DELETE ON produto
		FOR EACH ROW
		BEGIN
			SET @dadosAntigos = CONCAT(
				'ID: ', 			OLD.idProduto, 		' # ', 
				'Nome: ',			OLD.nome, 			' # ', 
				'Preço: ',			OLD.preco, 			' # ', 
				'Categoria: ',		OLD.categoria, 		' # ', 
				'Marca: ',			OLD.marca, 			' # ', 
				'Descricao: ',		OLD.descricao, 		' # ', 
				'Image: ',			OLD.imagem, 		' # ', 
				'Estoque_Min: ',	OLD.estoque_minimo, ' # ', 
				'Estoque_Max: ',	OLD.estoque_maximo, ' # ', 
				'Quantidade: ',		OLD.quant_estoque, 	' # '
			);

			SET @dadosNovos = CONCAT(
				'ID:    	   -- # ', 
				'Nome:   	   -- # ', 
				'Preço:   	   -- # ', 
				'Categoria:    -- # ', 
				'Marca:   	   -- # ', 
				'Descricao:    -- # ', 
				'Image:   	   -- # ', 
				'Estoque_Min:  -- # ', 
				'Estoque_Max:  -- # ', 
				'Quantidade:   -- # '
			);

			SET @DataProduto = SYSDATE();

			SET @usuario = CURRENT_USER();

			INSERT INTO log_produto 
			VALUES (
				NULL, 
				"Produto",
				@usuario, 
				@DataProduto, 
				"DELETE", 
				@dadosAntigos, 
				@dadosNovos
			);
		END;$$
	DELIMITER ;

-- Insert Estoque
	DROP TRIGGER IF EXISTS tr_addEstoqueProduto;
	DELIMITER $$
		CREATE TRIGGER tr_addEstoqueProduto
		AFTER INSERT ON produto
		FOR EACH ROW
		BEGIN
			SET @log_data = CURDATE();
			SET @log_hora = CURTIME();

			INSERT INTO estoque 
			VALUES (
				NULL, 
				NEW.idProduto, 
				NEW.quantidade, 
				"INSERT", 
				@log_data, 
				@log_hora
			);
		END; $$
	DELIMITER ;

-- Update Estoque
	DROP TRIGGER IF EXISTS tr_addEstoqueCompra;
	DELIMITER $$
		CREATE TRIGGER tr_addEstoqueCompra
		AFTER INSERT ON pedido_produto
		FOR EACH ROW
		BEGIN
			SET @log_data = CURDATE();
			SET @log_hora = CURTIME();

			INSERT INTO estoque 
			VALUES (
				NULL, 
				NEW.idProduto, 
				NEW.quantidade, 
				"COMPRA", 
				@log_data, 
				@log_hora
			);
		END; $$
	DELIMITER ;