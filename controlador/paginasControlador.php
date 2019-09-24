<?php

require "modelo/produtoModelo.php";

/** anon */
function index() {
    $dados = [];
    $dados['produto'] = pegarTodosProdutos();

    exibir("paginas/inicial", $dados);
}

/** anon */
function contato() {
    if (ehPost()) {
        $to = $_POST['nome'];
        $email = $_POST['email'];
        $subject = $_POST['assunto'];
        $message = $_POST['mensagem'];

        echo "$to<br>";
        echo "$email<br>";
        echo "$subject<br>";
        echo "$message<br>";
//        mail($to,$email,$subject);
    }
}