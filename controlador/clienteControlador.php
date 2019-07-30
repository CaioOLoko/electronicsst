<?php

require_once "servico/validacaoServico.php";
require_once "modelo/clienteModelo.php";

function adicionar() {
    if (ehPost()) {
        $nome = $_POST["nomeusuario"];
        $sobrenome = $_POST["sobrenomeusuario"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $cpf = $_POST["cpf"];
        $data_de_nascimento = $_POST["datadenascimento"];
        $sexo = $_POST["sexo"];
        $tipo_usuario = $_POST["tipousuario"];

        $errors = array();

        if (validaNome($nome, "Nome") != NULL) {
            $errors['nome'] = validaNome($nome, "Nome");
        }
        if (validaNome($sobrenome, "Sobrenome") != NULL) {
            $errors['sobrenome'] = validaNome($sobrenome, "Sobrenome");
        }
        if (validar_email($email) != NULL) {
            $errors['email'] = validar_email($email);
        }
        if (validar_quantidade_de_campos($senha, "Senha") != NULL) {
            $errors['senha'] = validar_quantidade_de_campos($senha, "Senha");
        }
        if (validaCPF($cpf) != NULL) {
            $errors['cpf'] = validaCPF($cpf);
        }
        if (validaData($data_de_nascimento) != NULL) {
            $errors['datadenascimento'] = validaData($data_de_nascimento);
        }
        if (count($errors) > 0) {
            $dados = array();
            $dados["errors"] = $errors;
            exibir("cliente/cadastro", $dados);
        } else {
            $retirarCPF = array(0 => "-", 1 => ".");
            $cpf = str_replace($retirarCPF, "", $cpf);
            echo $cpf;
            $msg = adicionarCliente($nome, $sobrenome, $email, $senha, $cpf, $data_de_nascimento, $sexo, $tipo_usuario);
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

function ver($id) {
    $dados["cliente"] = pegarClientePorId($id);
    exibir("cliente/visualizar", $dados);
}

function deletar($id) {
    $msg = deletarCliente($id);
    redirecionar("cliente/listarClientes");
}

function editar($id) {
    if (ehPost()) {
        $nome = $_POST["nomeusuario"];
        $sobrenome = $_POST["sobrenomeusuario"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $cpf = $_POST["cpf"];
        $data_de_nascimento = $_POST["datadenascimento"];
        $sexo = $_POST["sexo"];
        $tipo_usuario = $_POST["tipousuario"];

        $errors = array();

        if (validaNome($nome, "Nome") != NULL) {
            $errors['nome'] = validaNome($nome, "Nome");
        }
        if (validaNome($sobrenome, "Sobrenome") != NULL) {
            $errors['sobrenome'] = validaNome($sobrenome, "Sobrenome");
        }
        if (validar_email($email) != NULL) {
            $errors['email'] = validar_email($email);
        }
        if (validar_quantidade_de_campos($senha, "Senha") != NULL) {
            $errors['senha'] = validar_quantidade_de_campos($senha, "Senha");
        }
        if (validaCPF($cpf) != NULL) {
            $errors['cpf'] = validaCPF($cpf);
        }
        if (validaData($data_de_nascimento) != NULL) {
            $errors['datadenascimento'] = validaData($data_de_nascimento);
        }
        if (count($errors) > 0) {
            $dados = array();
            $dados["errors"] = $errors;
            exibir("cliente/cadastro", $dados);
        } else {
            $retirarCPF = array(0 => "-", 1 => ".");
            $cpf = str_replace($retirarCPF, "", $cpf);
            echo $cpf;
            editarCliente($nome, $sobrenome, $email, $senha, $cpf, $data_de_nascimento, $sexo, $tipo_usuario);
            redirecionar("cliente/listarClientes");
        }
    }else{
        $dados["cliente"] = pegarClientePorId($id);
        exibir("cliente/cadastro", $dados);
    }
}

function contato() {
    if (ehPost()) {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $assunto = $_POST["assunto"];
        $mensagem = $_POST["mensagem"];
        echo validar_elementos_obrigatorios($nome);
        echo validar_email($email);
        echo validar_elementos_obrigatorios($assunto);
        echo validar_elementos_obrigatorios($mensagem);

        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    } else {
        exibir("cliente/contato");
    }
}

?>