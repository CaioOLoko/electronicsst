<?php

require_once "servico/validacaoServico.php";
require_once "modelo/clienteModelo.php";
require_once "modelo/enderecoModelo.php";

/** admin */
function adicionar() {
    if (ehPost()) {
        $nome = $_POST["nomeusuario"];
        $sobrenome = $_POST["sobrenomeusuario"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $cpf = $_POST["cpf"];
        $data_de_nascimento = $_POST["ano"] . "-";
        $data_de_nascimento .= $_POST["mes"] . "-";
        $data_de_nascimento .= $_POST["dia"];
        $sexo = $_POST["sexo"];

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
            // arrumar a data de nascimento do cliente e o formato para sql
            $retirarCPF = array(0 => "-", 1 => ".");
            $cpf = str_replace($retirarCPF, "", $cpf);
            adicionarCliente($nome, $sobrenome, $email, $senha, $cpf, $data_de_nascimento, $sexo, "user");
            redirecionar("cliente/listarClientes");
        }
    } else {
        exibir("cliente/cadastro");
    }
}

/** admin */
function listarClientes() {
    $dados = array();
    $dados["clientes"] = pegarTodosClientes();
    exibir("cliente/listar", $dados);
}

/** anon */
function ver($id) {
    $dados["cliente"] = pegarClientePorId($id);
    $dados["enderecos"] = pegarTodosEnderecosPorIDCliente($id);
    exibir("cliente/visualizar", $dados);
}

/** admin */
function deletar($id) {
    deletarCliente($id);
    deletarEndereco($id);
    redirecionar("cliente/listarClientes");
}

/** anon */
function editar($id) {
    if (ehPost()) {
        $nome = $_POST["nomeusuario"];
        $sobrenome = $_POST["sobrenomeusuario"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $cpf = $_POST["cpf"];
        $data_de_nascimento = $_POST["ano"] . "-";
        $data_de_nascimento .= $_POST["mes"] . "-";
        $data_de_nascimento .= $_POST["dia"];
        $sexo = $_POST["sexo"];

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
            editarCliente($id, $nome, $sobrenome, $email, $senha, $cpf, $data_de_nascimento, $sexo, $tipo_usuario);
            redirecionar("cliente/listarClientes");
        }
    } else {
        $dados["cliente"] = pegarClientePorId($id);
        exibir("cliente/editar", $dados);
    }
}