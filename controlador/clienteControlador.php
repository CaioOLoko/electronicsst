<?php

require("servico/validacaoServico.php");
require_once "modelo/clienteModelo.php";

function adicionar() {
	if (ehPost()) {

		$nome = $_POST["nomeusuario"];
		$email = $_POST["email"];
		$senha = $_POST["senha"];
		$cpf = $_POST["cpf"];
		$data_de_nascimento = $_POST["datadenascimento"];
		$sexo = $_POST["sexo"];
		$tipo_usuario = $_POST["tipousuario"];
	
		$errors = array();

		/*if(validar_elementos_obrigatorios($nome, "Nome")){;
			echo "Deu certo<br>";
		}else{
			echo "Deu errado<br>";
		}*/
		if (validar_elementos_obrigatorios($nome, "Nome") != NULL) {
			$errors[] = validar_elementos_obrigatorios($nome, "Nome");
		}
		if (validar_email($email) != NULL) {
			$errors[] = validar_email($email);
		}
		if (validar_quantidade_de_campos($senha, "Senha") != NULL) {
			$errors[] = validar_quantidade_de_campos($senha, "Senha");
		}
		if (validaCPF($cpf) != NULL) {
			$errors[] = validaCPF($cpf);
		}
		if (validar_elementos_especificos($data_de_nascimento, "Data de Nascimento") != NULL) {
			$errors[] = validar_elementos_especificos($data_de_nascimento, "Data de Nascimento");
		}
		if (count($errors) > 0) {
			$dados = array();
			$dados["errors"] = $errors;
			exibir("cliente/cadastro", $dados);
		} else {
                    $retirarCPF = array(0=>"-",1=>".");
                    $cpf= str_replace($retirarCPF,"" ,$cpf);
                    echo $cpf;
                    $msg = adicionarCliente($nome,$email, $senha, $cpf, $data_de_nascimento, $sexo, $tipo_usuario);
                    redirecionar("cliente/listarClientes");
		}
	} else {
		exibir("cliente/cadastro");
	}
}

function listarClientes() {
	$dados = array();
	$dados["clientes"] = pegarTodosClientes();
	exibir("cliente/listar", $dados);
}

function ver($id){
    //passa o $id para a função pegarClientePorId do modelo
    $dados["cliente"] = pegarClientePorId($id);
    //chama o arquivo: visao/cliente/visualizar.visao.php
    exibir("cliente/visualizar", $dados);
}


function contato() {
	if (ehPost()) {

		$nome = $_POST["nome"];
		$email = $_POST["email"];
		$assunto = $_POST["assunto"];
		$telefone = $_POST["telefone"];
		$endereco = $_POST["endereco"];
		$mensagem = $_POST["mensagem"];

		echo validar_elementos_obrigatorios($nome);
		echo validar_email($email);
		echo validar_elementos_obrigatorios($assunto);
		echo validar_elementos_especificos($telefone);
		echo validar_elementos_obrigatorios($endereco);
		echo validar_elementos_obrigatorios($mensagem);

		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
	} else {
		exibir("cliente/contato");
	}
}
?>

