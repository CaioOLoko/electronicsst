<?php

function validar_elementos_obrigatorios($nome, $tipo) {
    if (strlen(trim($nome)) == 0) {
        return "$tipo obrigatório.<br>";
    } else {
        return NULL;
    }
}

function validar_email($email) {
    if (strlen(trim($email)) == 0) {
        return "Você deve inserir um e-mail!<br>";
    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        return "Informe um e-mail válido!<br>";
    } else {
        return NULL;
    }
}

function validar_elementos_especificos($valor, $campo) {
    $input['valor'] = filter_var($valor, FILTER_SANITIZE_NUMBER_INT);
    if ($input['valor'] == FALSE) {
        return "Informe valor(es) numérico(s) no campo $campo!<br>";
    } else {
        return NULL;
    }
}

function validaCPF($cpf) {

    // Verifica se um número foi informado
    if (strlen(trim($cpf)) == 0) {
        return "CPF obrigatório.<br>";
    } else {
        // Elimina possível máscara
        $cpf = preg_replace("/[^0-9]/", "", $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        // Verifica se o numero de digitos informados é igual a 11 
        if (strlen($cpf) != 11) {
            return "Número de dígitos diferente de 11<br>";
        }
        // Verifica se nenhuma das sequências invalidas abaixo 
        // foi digitada.
        else if ($cpf == '00000000000' ||
                $cpf == '11111111111' ||
                $cpf == '22222222222' ||
                $cpf == '33333333333' ||
                $cpf == '44444444444' ||
                $cpf == '55555555555' ||
                $cpf == '66666666666' ||
                $cpf == '77777777777' ||
                $cpf == '88888888888' ||
                $cpf == '99999999999') {
            return "Sequência inválida informada<br>";
            // Calcula os digitos verificadores para verificar se o
            // CPF é válido
        } else {

            for ($t = 9; $t < 11; $t++) {

                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return "Informe um CPF válido<br>";
                }
            }
            return NULL;
        }
    }
}
