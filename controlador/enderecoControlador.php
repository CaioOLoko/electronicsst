<?php

require_once "servico/validacaoServico.php";
require_once "modelo/enderecoModelo.php";

function adicionar($idusuario) {
    if (ehPost()) {
        
        $logradouro = $_POST["logradouro"];
        $numero = $_POST["numero"];
        $complemento = $_POST["complemento"];
        $bairro = $_POST["bairro"];
        $cidade = $_POST["cidade"];
        $cep = $_POST["cep"];

        $errors = array();

        if (validar_elementos_obrigatorios($logradouro, "Logradouro") != NULL) {
            $errors['logradouro'] = validar_elementos_obrigatorios($logradouro, "Logradouro");
        }
        if (validar_elementos_obrigatorios($numero, "Número") != NULL) {
            $errors['numero'] = validar_elementos_obrigatorios($numero, "Número");
        }
        if (validar_elementos_obrigatorios($bairro, "Bairro") != NULL) {
            $errors['bairro'] = validar_elementos_obrigatorios($bairro, "Bairro");
        }
        if (validar_elementos_obrigatorios($cidade, "Cidade") != NULL) {
            $errors['cidade'] = validar_elementos_obrigatorios($cidade, "Cidade");
        }
        /* if (validarCep($cep) != NULL) {
          $errors['cep'] = validaCPF($cep);
          } */

        if (count($errors) > 0) {
            $dados = array();
            $dados["errors"] = $errors;
            exibir("endereco/formulario", $dados);
        } else {
            $retirarCPF = array(0 => "-", 1 => ".");
            $cpf = str_replace($retirarCPF, "", $cpf);
            echo $cpf;
            $msg = adicionarEndereco($idusuario,$logradouro, $numero, $complemento, $bairro, $cidade, $cep);
            redirecionar("endereco/listarEnderecos");
        }
    } else {
        exibir("endereco/formulario");
    }
}

function listarEnderecos() {
    $dados = array();
    $dados["enderecos"] = pegarTodosEnderecos();
    exibir("endereco/listar", $dados);
}

function ver($id) {
    $dados["endereco"] = pegarEnderecoPorId($id);
    exibir("endereco/visualizar", $dados);
}

function deletar($id) {
    $msg = deletarEndereco($id);
    redirecionar("endereco/listarEnderecos");
}

function editar($id) {
    if (ehPost()) {
        $logradouro = $_POST["logradouro"];
        $numero = $_POST["numero"];
        $complemento = $_POST["complemento"];
        $bairro = $_POST["bairro"];
        $cidade = $_POST["cidade"];
        $cep = $_POST["cep"];

        $errors = array();

        if (validar_elementos_obrigatorios($logradouro, "Logradouro") != NULL) {
            $errors['logradouro'] = validar_elementos_obrigatorios($logradouro, "Logradouro");
        }
        if (validar_elementos_obrigatorios($numero, "Número") != NULL) {
            $errors['numero'] = validar_elementos_obrigatorios($numero, "Número");
        }
        if (validar_elementos_obrigatorios($bairro, "Bairro") != NULL) {
            $errors['bairro'] = validar_elementos_obrigatorios($bairro, "Bairro");
        }
        if (validar_elementos_obrigatorios($cidade, "Cidade") != NULL) {
            $errors['cidade'] = validar_elementos_obrigatorios($cidade, "Cidade");
        }
        /* if (validarCep($cep) != NULL) {
          $errors['cep'] = validaCPF($cep);
          } */
        
        if (count($errors) > 0) {
            $dados = array();
            $dados["errors"] = $errors;
            exibir("endereco/formulario", $dados);
        } else {
            $retirarCPF = array(0 => "-", 1 => ".");
            $cpf = str_replace($retirarCPF, "", $cpf);
            echo $cpf;
            editarEndereco($id, $logradouro, $numero, $complemento, $bairro, $cidade, $cep);
            redirecionar("endereco/listarEnderecos");
        }
    } else {
        $dados["endereco"] = pegarEnderecoPorId($id);
        exibir("endereco/formulario", $dados);
    }
}
