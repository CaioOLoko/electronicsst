<?php

function validar_elementos_obrigatorios($nome) {
    if (strlen(trim($nome))==0) {
        $errors = "Você deve inserir um e-mail";
        return $errors;
    }
}

function validar_elementos_especificos($x) {

    $input['ano'] = filter_var($x, FILTER_VALIDATE_INT);
    if ($input['ano'] == FALSE) {
        return 'Informe um ano valido.';
    }
}
