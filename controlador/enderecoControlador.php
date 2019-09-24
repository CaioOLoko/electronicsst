<?php

require_once "servico/validacaoServico.php";
require_once "modelo/enderecoModelo.php";

/** anon */
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
            $msg = adicionarEndereco($idusuario,$logradouro, $numero, $complemento, $bairro, $cidade, $cep);
            redirecionar("cliente/ver/$idusuario");
        }
    } else {
        exibir("endereco/formulario");
    }
}

/** admin */
function listarEnderecos() {
    $dados = array();
    $dados["enderecos"] = pegarTodosEnderecos();
    exibir("endereco/listar", $dados);
}

/** anon */
function ver($id) {
    $dados["endereco"] = pegarEnderecoPorId($id);
    exibir("endereco/visualizar", $dados);
}

/** admin */
function deletar($id) {
    $msg = deletarEndereco($id);
    redirecionar("endereco/listarEnderecos");
}

/** anon */
function editar($idusuario, $idendereco) {
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
            editarEndereco($idendereco, $logradouro, $numero, $complemento, $bairro, $cidade, $cep);
            redirecionar("cliente/ver/$idusuario");
        }
    } else {
        $dados["endereco"] = pegarEnderecoPorId($idendereco);
        exibir("endereco/formulario", $dados);
    }
}
