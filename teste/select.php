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
            //echo "tamanho=".$linha_tam["tamanho"]."<br />";
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
            //echo "cor=".$linha_cor["cor"]."<br />";
        }else{
        $id_cor += 1;
        $insere_cor = $pdo->prepare("INSERT INTO cores (titulo, id) VALUES('$linha_cor[cor]',$id_cor)");
        $insere_cor->execute();
         }
    }
    $busca_produto = $pdo->prepare("SELECT codigo, titulo, cor, tamanho FROM dados_antigos");
    $busca_produto->execute();
    $busca_produto->setFetchMode(PDO::FETCH_ASSOC);
    foreach ($busca_produto as $linha_produto) {
        $id_produto += 1;
        $id_produto_cores += 1;
        $id_produto_tamanhos += 1;
        $busca_id_cor = $pdo->query("SELECT id FROM cores WHERE titulo='$linha_produto[cor]'");
        $result = $busca_id_cor->fetch(PDO::FETCH_ASSOC);
        $busca_id_tamanho = $pdo->query("SELECT id FROM tamanhos WHERE titulo=$linha_produto[tamanho]");
        $result3 = $busca_id_tamanho->fetch(PDO::FETCH_ASSOC);
        $insere_produto = $pdo->prepare("INSERT INTO produtos (codigo, titulo, id) VALUES($linha_produto[codigo], '$linha_produto[titulo]', $id_produto)");
        $insere_produto->execute();
        $busca_produto_cores = $pdo->query("SELECT id FROM produtos WHERE id=$id_produto");
        $result2 = $busca_produto_cores->fetch(PDO::FETCH_ASSOC);
        $insere_produto_cores = $pdo->prepare("INSERT INTO produtos_cores (id, id_cor, id_produto) VALUES($id_produto_cores, $result[id], $result2[id])");
        $insere_produto_cores->execute();
        $insere_produtos_tamanhos = $pdo->prepare("INSERT INTO produtos_tamanhos (id, id_produto_cor, id_tamanho) VALUES ($id_produto_tamanhos, $result[id], $result3[id])");
        $insere_produtos_tamanhos->execute();
    }


        /*$verifica_duplicado_produto = $pdo->prepare("SELECT codigo, titulo FROM produtos WHERE codigo=$linha_produto[codigo] AND titulo='$linha_produto[titulo]'");
        $verifica_duplicado_produto->execute();
        if ($verifica_duplicado_produto->rowCount() > 0) {
            echo "codigo=" . $linha_produto["codigo"] . "<br />";
            echo "titulo=" . $linha_produto["titulo"] . "<br />";
        }*/
    /*$busca_id_cor_bra = $pdo->prepare("SELECT id FROM cores where titulo='Branco'");
    $busca_id_cor_bra->execute();
    $cor_bra = $busca_id_cor_bra->fetch(PDO::FETCH_ASSOC);
    echo "ID=".$cor_bra["id"]."<br />";

    $busca_id_cor_azu = $pdo->prepare("SELECT id FROM cores where titulo='Azul'");
    $busca_id_cor_azu->execute();
    $cor_azu = $busca_id_cor_azu->fetch(PDO::FETCH_ASSOC);
    echo "ID=".$cor_azu["id"]."<br />";

    $busca_id_cor_pre = $pdo->prepare("SELECT id FROM cores where titulo='Preto'");
    $busca_id_cor_pre->execute();
    $cor_pre = $busca_id_cor_pre->fetch(PDO::FETCH_ASSOC);
    echo "ID=".$cor_pre["id"]."<br />";

    $busca_id_cor_ver = $pdo->prepare("SELECT id FROM cores where titulo='Vermelho'");
    $busca_id_cor_ver->execute();
    $cor_ver = $busca_id_cor_ver->fetch(PDO::FETCH_ASSOC);
    echo "ID=".$cor_ver["id"]."<br />";

    $busca_id_produto = $pdo->prepare("SELECT id FROM ")
       */


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