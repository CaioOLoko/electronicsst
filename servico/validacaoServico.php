<?php

function validar_elementos_obrigatorios($nome) {
    if (strlen(trim($nome)) == 0) {
        return "Campo obrigatório.<br>";
    }else{
        return NULL;
    }
}

function validar_email($email) {
    if (strlen(trim($email)) == 0) {
        $errors[] = "Você deve inserir um e-mail!<br>";
    } else {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $errors[] = "Informe um e-mail válido!<br>";
        }
    }
}

function validar_elementos_especificos($valor) {
    $input['valor'] = filter_var($valor, FILTER_SANITIZE_NUMBER_INT);
    if ($input['valor'] == FALSE) {
        return 'Informe valor(es) numérico(s).<br>';
    }
}
