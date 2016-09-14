<?php
include_once ("conect.php");
$pdo=  conectar();
 //prepara para cadastrar
    $buscaseg=$pdo->prepare("INSERT INTO usuario(nome)VALUES(:nome)");
    $buscaseg->bindValue(":nome","abc");
    //valida o cadastro
    $validar=$pdo->prepare("SELECT * FROM usuario WHERE nome=?");
    $validar->execute(array("abc"));
    if($validar->rowCount() == 0){
    //executa o cadastro
    $buscaseg->execute();
    }else{
        echo "já existe!";
    }