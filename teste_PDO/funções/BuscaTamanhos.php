<?php
$pdo = conectar();
class BuscaTamanhos{


public function buscar($pdo){
    $stat = $pdo->prepare("SELECT tamanho FROM dados_antigos");
    $stat->execute();

    $tamanhos = array();
    while($linha = $stat->fetch()){
        $tamanhos[] = new Tamanhos($linha->titulo);
        }
    print_r($tamanhos);
    }
}

$obj = new BuscaTamanhos;
$obj->buscar($pdo);
var_dump($obj);