<?php
include_once ("conect.php");
//conexão com banco
$pdo = conectar();
/*busca todos dados antigos a serem migrados
$busca=$pdo->prepare("SELECT * FROM dados_antigos");
$busca->execute();
coloca resultado em um array
$linha = $busca->fetchAll(PDO::FETCH_ASSOC);
var_dump($linha);*/

    $busca_tamanhos = $pdo->prepare("SELECT tamanho FROM dados_antigos");
    $busca_tamanhos->execute(array(''));
    while($linha = $busca_tamanhos->fetch(PDO::FETCH_ASSOC)){
        var_dump($linha
        $linha['tamanho'] as string($linha);
        $insere_tamanhos = $pdo->prepare("INSERT INTO tamanhos (titulo) VALUES($linha)");
        $insere_tamanhos->execute();

    }

/*foreach ($linha as $listar){
    echo "codigo=".$listar->codigo."<br />";
    echo "titulo=".$listar->titulo."<br />";
    echo "cor=".$listar->cor."<br />";
    echo "tamanho=".$listar->tamanho."<br />";
} */
/*
while($linha=$busca->fetch(PDO::FETCH_ASSOC)){
    echo "nome=".$linha["nome"]."<br />";
}
*/

