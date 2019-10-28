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
				'  ID:    		 	  # ', 
				'\nNome:   		 	  # ', 
				'\nPreço:   	 	  # ', 
				'\nCategoria:    	  # ', 
				'\nMarca:   	 	  # ', 
				'\nDescricao:         # ', 
				'\nImage:   	 	  # ', 
				'\nEstoque_Min:       # ', 
				'\nEstoque_Max:       # ', 
				'\nQuantidade:    	  # ',
				'\nCódigo_Barra:      # ', 
				'\nCor:   		 	  # ', 
				'\nTipo de Chip:      # ', 
				'\nQuanti Chip:       # ', 
				'\nMemória Int:       # ', 
				'\nMemória RAM:       # ', 
				'\nProcessador:       # ', 
				'\nDisplay:    	 	  # ', 
				'\nSO: '
			);

			SET @dadosNovos = CONCAT(
				'  ID: ', 			NEW.idProduto, 		' # ', 
				'\nNome: ',			NEW.nome, 			' # ', 
				'\nPreço: ',		NEW.preco, 			' # ', 
				'\nCategoria: ',	NEW.categoria, 		' # ', 
				'\nMarca: ',		NEW.marca, 			' # ', 
				'\nDescricao: ',	NEW.descricao, 		' # ', 
				'\nImage: ',		NEW.imagem, 		' # ', 
				'\nEstoque_Min: ',	NEW.estoque_minimo, ' # ', 
				'\nEstoque_Max: ',	NEW.estoque_maximo, ' # ', 
				'\nQuantidade: ',	NEW.quant_estoque, 	' # ',
				'\nCódigo_Barra: ',	NEW.cod_barras, 	' # ', 
				'\nCor: ',			NEW.cor, 			' # ', 
				'\nTipo de Chip: ', NEW.tipo_chip, 		' # ', 
				'\nQuanti Chip: ', 	NEW.quant_chip, 	' # ', 
				'\nMemória Int: ', 	NEW.mem_interna, 	' # ', 
				'\nMemória RAM: ', 	NEW.mem_ram, 		' # ', 
				'\nProcessador: ', 	NEW.processador, 	' # ', 
				'\nDisplay: ', 		NEW.display, 		' # ', 
				'\nSO: ', 			NEW.so
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
				'  ID: ', 			OLD.idProduto, 		' # ', 
				'\nNome: ',			OLD.nome, 			' # ', 
				'\nPreço: ',		OLD.preco, 			' # ', 
				'\nCategoria: ',	OLD.categoria, 		' # ', 
				'\nMarca: ',		OLD.marca, 			' # ', 
				'\nDescricao: ',	OLD.descricao, 		' # ', 
				'\nImage: ',		OLD.imagem, 		' # ', 
				'\nEstoque_Min: ',	OLD.estoque_minimo, ' # ', 
				'\nEstoque_Max: ',	OLD.estoque_maximo, ' # ', 
				'\nQuantidade: ',	OLD.quant_estoque, 	' # ',
				'\nCódigo_Barra: ',	OLD.cod_barras, 	' # ', 
				'\nCor: ',			OLD.cor, 			' # ', 
				'\nTipo de Chip: ', OLD.tipo_chip, 		' # ', 
				'\nQuanti Chip: ', 	OLD.quant_chip, 	' # ', 
				'\nMemória Int: ', 	OLD.mem_interna, 	' # ', 
				'\nMemória RAM: ', 	OLD.mem_ram, 		' # ', 
				'\nProcessador: ', 	OLD.processador, 	' # ', 
				'\nDisplay: ', 		OLD.display, 		' # ', 
				'\nSO: ', 			OLD.so
			);

			SET @dadosNovos = CONCAT(
				'  ID: ', 			NEW.idProduto, 		' # ', 
				'\nNome: ',			NEW.nome, 			' # ', 
				'\nPreço: ',		NEW.preco, 			' # ', 
				'\nCategoria: ',	NEW.categoria, 		' # ', 
				'\nMarca: ',		NEW.marca, 			' # ', 
				'\nDescricao: ',	NEW.descricao, 		' # ', 
				'\nImage: ',		NEW.imagem, 		' # ', 
				'\nEstoque_Min: ',	NEW.estoque_minimo, ' # ', 
				'\nEstoque_Max: ',	NEW.estoque_maximo, ' # ', 
				'\nQuantidade: ',	NEW.quant_estoque, 	' # ',
				'\nCódigo_Barra: ',	NEW.cod_barras, 	' # ', 
				'\nCor: ',			NEW.cor, 			' # ', 
				'\nTipo de Chip: ', NEW.tipo_chip, 		' # ', 
				'\nQuanti Chip: ', 	NEW.quant_chip, 	' # ', 
				'\nMemória Int: ', 	NEW.mem_interna, 	' # ', 
				'\nMemória RAM: ', 	NEW.mem_ram, 		' # ', 
				'\nProcessador: ', 	NEW.processador, 	' # ', 
				'\nDisplay: ', 		NEW.display, 		' # ', 
				'\nSO: ', 			NEW.so
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
		BEFORE DELETE ON produto
		FOR EACH ROW
		BEGIN
			SET @dadosAntigos = CONCAT(
				'  ID: ', 			OLD.idProduto, 		' # ', 
				'\nNome: ',			OLD.nome, 			' # ', 
				'\nPreço: ',		OLD.preco, 			' # ', 
				'\nCategoria: ',	OLD.categoria, 		' # ', 
				'\nMarca: ',		OLD.marca, 			' # ', 
				'\nDescricao: ',	OLD.descricao, 		' # ', 
				'\nImage: ',		OLD.imagem, 		' # ', 
				'\nEstoque_Min: ',	OLD.estoque_minimo, ' # ', 
				'\nEstoque_Max: ',	OLD.estoque_maximo, ' # ', 
				'\nQuantidade: ',	OLD.quant_estoque, 	' # ',
				'\nCódigo_Barra: ',	OLD.cod_barras, 	' # ', 
				'\nCor: ',			OLD.cor, 			' # ', 
				'\nTipo de Chip: ', OLD.tipo_chip, 		' # ', 
				'\nQuanti Chip: ', 	OLD.quant_chip, 	' # ', 
				'\nMemória Int: ', 	OLD.mem_interna, 	' # ', 
				'\nMemória RAM: ', 	OLD.mem_ram, 		' # ', 
				'\nProcessador: ', 	OLD.processador, 	' # ', 
				'\nDisplay: ', 		OLD.display, 		' # ', 
				'\nSO: ', 			OLD.so
			);

			SET @dadosNovos = CONCAT(
				'  ID:    		 -- # ', 
				'\nNome:   		 -- # ', 
				'\nPreço:   	 -- # ', 
				'\nCategoria:    -- # ', 
				'\nMarca:   	 -- # ', 
				'\nDescricao:    -- # ', 
				'\nImage:   	 -- # ', 
				'\nEstoque_Min:  -- # ', 
				'\nEstoque_Max:  -- # ', 
				'\nQuantidade:   -- # ',
				'\nCódigo_Barra: -- # ', 
				'\nCor:   		 -- # ', 
				'\nTipo de Chip: -- # ', 
				'\nQuanti Chip:  -- # ', 
				'\nMemória Int:  -- # ', 
				'\nMemória RAM:  -- # ', 
				'\nProcessador:  -- # ', 
				'\nDisplay:    	 -- # ', 
				'\nSO:           --   '
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