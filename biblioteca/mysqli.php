<?php

function conn() {
//    $cnx = mysqli_connect("localhost", "root", "", "electronicsst");
     $cnx = mysqli_connect("localhost", "id9976030_samuelfacchetti", "SaLe23091976", "id9976030_electronicsst");
    if (!$cnx) {
        die('Deu errado a conexao!');
    }
    return $cnx;
}
