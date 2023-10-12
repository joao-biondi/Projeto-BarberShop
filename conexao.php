<?php

$host = "sql307.infinityfree.com";
$user = "if0_34708958";
$pass = "98DG2DObQB";
$dbname = "if0_34708958_barbearia";

try{
    //Conexão com a porta
    //$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

    //Conexão sem a porta
    $conexao = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);

    //echo "Conexão com banco de dados realizado com sucesso!";
}  catch(PDOException $err){
    die("Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado " . $err->getMessage());
}