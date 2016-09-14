<?php

function conectar(){
    try{
    $pdo = new PDO("mysql:host=localhost;dbname=teste_selecao","root","");
    }catch (PDOException $e){
       echo $e->getMessage();
    }
    return $pdo;
}
   
    
    
    


    