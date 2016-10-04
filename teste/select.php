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
    $busca_tamanhos->execute();
    $busca_tamanhos->setFetchMode(PDO::FETCH_ASSOC);
    foreach ($busca_tamanhos as $linha_tam){
        $verifica_duplicado_tam = $pdo->prepare("SELECT titulo FROM tamanhos WHERE titulo=$linha_tam[tamanho]");
        $verifica_duplicado_tam->execute();
        if($verifica_duplicado_tam->fetchColumn()!=0){
            echo "tamanho=".$linha_tam["tamanho"]."<br />";
        }else{
            $id_tamanho += 1;
            $insere_tamanhos = $pdo->prepare("INSERT INTO tamanhos (titulo, id) VALUES($linha_tam[tamanho],$id_tamanho)");
            $insere_tamanhos->execute();
        }
    }
    $busca_cor = $pdo->prepare("SELECT cor FROM dados_antigos");
    $busca_cor->execute();
    $busca_cor->setFetchMode(PDO::FETCH_ASSOC);
    foreach ($busca_cor as $linha_cor){

        $verifica_duplicado_cor = $pdo->prepare("SELECT titulo FROM cores WHERE titulo='$linha_cor[cor]'");
        $verifica_duplicado_cor->execute();
        if($verifica_duplicado_cor->rowCount() > 0){
            echo "cor=".$linha_cor["cor"]."<br />";
        }else{
        $id_cor += 1;
        $insere_cor = $pdo->prepare("INSERT INTO cores (titulo, id) VALUES('$linha_cor[cor]',$id_cor)");
        $insere_cor->execute();
         }
    }
    $busca_produto = $pdo->prepare("SELECT codigo, titulo FROM dados_antigos");
    $busca_produto->execute();
    $busca_produto->setFetchMode(PDO::FETCH_ASSOC);
    foreach ($busca_produto as $linha_produto) {
        $id_produto += 1;
        $insere_produto = $pdo->prepare("INSERT INTO produtos (codigo, titulo, id) VALUES($linha_produto[codigo], '$linha_produto[titulo]', $id_produto)");
        $insere_produto->execute();
        $verifica_duplicado_produto = $pdo->prepare("SELECT codigo, titulo FROM produtos WHERE codigo=$linha_produto[codigo] AND titulo='$linha_produto[titulo]'");
        $verifica_duplicado_produto->execute();
        if ($verifica_duplicado_produto->rowCount() > 0) {
            echo "codigo=" . $linha_produto["codigo"] . "<br />";
            echo "titulo=" . $linha_produto["titulo"] . "<br />";
        }
    }
    $busca_id_cor = $pdo->prepare("SELECT ")


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