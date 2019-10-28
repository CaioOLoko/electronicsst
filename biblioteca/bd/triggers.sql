-- Update quantidade do produto pós-venda
	DROP TRIGGER IF EXISTS tr_attQuantProduto;
	DELIMITER $$
		CREATE TRIGGER tr_attQuantProduto
		AFTER INSERT ON pedido_produto
		FOR EACH ROW
		BEGIN
			UPDATE produto 
			SET quant_estoque = quant_estoque - NEW.quant_estoque
			WHERE produto.idProduto = NEW.idProduto;
		END;$$
	DELIMITER ;

-- Insert LOGPRODUTO
	DROP TRIGGER IF EXISTS tr_addLogProduto;
	DELIMITER $$
		CREATE TRIGGER tr_addLogProduto
		AFTER INSERT ON produto
		FOR EACH ROW
		BEGIN
			SET @dadosNovos = CONCAT(NEW.idProduto, ' # ', NEW.nome, ' # ', NEW.quant_estoque);
			SET @DataProduto = SYSDATE();
			SET @usuario = CURRENT_USER();
			
			INSERT INTO log_produto 
			VALUES (
				NULL, 
				"Produto",
				@usuario, 
				@DataProduto, 
				"INSERT", 
				@dados
			);
		END;$$
	DELIMITER ;

-- Update LOGPRODUTO
	DROP TRIGGER IF EXISTS tr_uptLogProduto;
	DELIMITER $$
		CREATE TRIGGER tr_uptLogProduto
		AFTER UPDATE ON produto
		FOR EACH ROW
		BEGIN
			SET @dados = CONCAT(OLD.idProduto, " # ", OLD.nome, " # ", OLD.quant_estoque, " // // ", NEW.idProduto, ' # ', NEW.nome, ' # ', NEW.quant_estoque);
			SET @DataProduto = SYSDATE();
			SET @usuario = CURRENT_USER();

			INSERT INTO log_produto 
			VALUES (
				NULL, 
				"Produto",
				@usuario, 
				@DataProduto, 
				"UPDATE", 
				@dados
			);
		END;$$
	DELIMITER ;

-- Delete LOGPRODUTO
	DROP TRIGGER IF EXISTS tr_remLogProduto;
	DELIMITER $$
		CREATE TRIGGER tr_remLogProduto
		BEFORE DELETE ON produto
		FOR EACH ROW
		BEGIN
			SET @dados = CONCAT(OLD.idProduto, " # ", OLD.nome, " # ", OLD.quant_estoque);
			SET @DataProduto = SYSDATE();
			SET @usuario = CURRENT_USER();

			INSERT INTO log_produto 
			VALUES (
				NULL, 
				"Produto",
				@usuario, 
				@DataProduto, 
				"DELETE", 
				@dados
			);
		END;$$
	DELIMITER ;