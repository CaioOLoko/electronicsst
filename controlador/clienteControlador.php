<?php

require("servico/validacaoServico.php");
require_once "modelo/clienteModelo.php";

function adicionar() {
    if (ehPost()) {

        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $cpf = $_POST["cpf"];
        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
        $data_de_nascimento = $_POST["data_de_nascimento"];
        $sexo = $_POST["sexo"];
        $telefone = $_POST["telefone"];
        
        $errors = array();
        
        if(validar_elementos_obrigatorios($nome) != NULL){
            $errors[] = 
        }
        
        validar_email($email);
        validar_elementos_obrigatorios($senha);
        validar_elementos_especificos($cpf);
        validar_elementos_obrigatorios($nome);
        validar_elementos_obrigatorios($sobrenome);
        validar_elementos_especificos($data_de_nascimento);
        validar_elementos_especificos($telefone);

        if (count($errors) > 0) {
            $dados = array();
            $dados["errors"] = $errors;
            exibir("cliente/cadastro", $dados);
        } else {
            $msg = adicionarCliente($email, $senha, $cpf, $nome, $sobrenome, $data_de_nascimento, $sexo, $telefone);
            redirecionar("cliente/listasrClientes");
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

