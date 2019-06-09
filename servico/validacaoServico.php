<?php

function validar_elementos_obrigatorios($nome, $tipo) {
    if (strlen(trim($nome)) == 0) {
        return "$tipo obrigatório.<br>";
    } elseif ((strlen(trim($campo)) > 60)) {
        return "Campo $tipo excedeu o limite de caracteres!<br>";
    }else {
        $nome = htmlentities($nome);
        $nome = str_split($nome);

        for ($i = 0; $i < count($nome); $i++) {
            if ($nome[$i] == '&') {
                return "Informe um $tipo válido!<br>";
                break;
            } else {
                return NULL;
            }
        }
    }

//str_word_count( $string , formatoExibicao , caratceresConsiderados );
}

function validar_quantidade_de_campos($campo, $tipo) {
    if (strlen(trim($campo)) == 0) {
        return "$tipo obrigatório.<br>";
    } elseif ((strlen(trim($campo)) > 30)) {
        return "Campo $tipo excedeu o limite de caracteres!<br>";
    }else{
        return NULL;
    }
}

function validar_email($email) {
    $email = strip_tags($email);
    if (strlen(trim($email)) == 0) {
        return "Você deve inserir um e-mail!<br>";
    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        return "Informe um e-mail válido!<br>";
    } else {
        return NULL;
    }
}

function validar_elementos_especificos($valor, $campo) {
    $valor = strip_tags($valor);
    $input['valor'] = filter_var($valor, FILTER_SANITIZE_NUMBER_INT);
    if ($input['valor'] == FALSE) {
        return "Informe valor(es) numérico(s) no campo $campo!<br>";
    } else {
        return NULL;
    }
}

function validaCPF($valor) {

    $valor = strip_tags($valor);

// Verifica se um número foi informado
    if (strlen(trim($valor)) == 0) {
        return "CPF obrigatório.<br>";
    } else {
// Elimina possível máscara
        $valor = str_replace(array('.', '-', '/'), "", $valor);
        $cpf = str_pad(preg_replace('[^0-9]', '', $valor), 11, '0', STR_PAD_LEFT);

// Verifica se o numero de digitos informados é igual a 11 
        if (strlen($cpf) != 11) {
            return "Número de dígitos diferente de 11.<br>";
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
            return "CPF inválido.<br>";
// Calcula os digitos verificadores para verificar se o
// CPF é válido
        } else {

            for ($t = 9; $t < 11; $t++) {

                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return "Informe um CPF válido.<br>";
                }
            }
            return NULL;
        }
    }
}

?>