<?php

try{
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "cardapio";

    $conexao = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    #echo "Deu certo";
} catch(PDOException $erro) {
    echo "Ocorreu um erro no DB: " . $erro;
}

?>