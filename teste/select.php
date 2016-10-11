<?php
include_once ("conect.php");
//conexão com banco
$pdo = conectar();
class
   public function IncluirTamanhos($pdo, $busca_tamanhos){
        while ($linha_tamanhos = $busca_tamanhos->fetch(PDO::FETCH_OBJ)) {
                $verifica_duplicado_tamanhos = $pdo->query("SELECT titulo FROM tamanhos WHERE titulo=$linha_tamanhos->tamanho");
            if ($verifica_duplicado_tamanhos->rowCount() > 0) {

            }else{
                $insere_tamanhos = $pdo->prepare("INSERT INTO tamanhos (titulo) VALUES(?)");
                $insere_tamanhos->bindParam(1, $linha_tamanhos->tamanho, PDO::PARAM_INT);
                $insere_tamanhos->execute();
                return;
        }
    }
}
    public function Incluir_cores($pdo, $busca_cor){
            while ($linha_cor = $busca_cor->fetch(PDO::FETCH_OBJ)){
                   $verifica_duplicado_cor = $pdo->query("SELECT titulo FROM cores WHERE titulo='$linha_cor->cor'");
                if ($verifica_duplicado_cor->rowCount() > 0){
                    echo "cor=" . $linha_cor->cor . "<br />";
                }else {
                    $insere_cor = $pdo->prepare("INSERT INTO cores (titulo) VALUES(?)");
                    $insere_cor->bindParam(1, $linha_cor->cor, PDO::PARAM_STR);
                    $insere_cor->execute();
        }
    }
}

    $busca_produto = $pdo->query("SELECT codigo, titulo, cor, tamanho FROM dados_antigos");
    while($linha_produto = $busca_produto->fetch(PDO::FETCH_OBJ)) {

        $busca_id_cor = $pdo->query("SELECT id FROM cores WHERE titulo='$linha_produto->cor'");
        $resultado_id_cor = $busca_id_cor->fetch(PDO::FETCH_OBJ);
        //echo "ID_COR=" . "$resultado_id_cor->id" . "<br />";

        $busca_id_tamanho = $pdo->query("SELECT id FROM tamanhos WHERE titulo=$linha_produto->tamanho");
        $resultado_id_tamanho = $busca_id_tamanho->fetch(PDO::FETCH_OBJ);
        //echo "ID_TAMANHO=" . "$resultado_id_tamanho->id" . "<br />";

        $insere_produto = $pdo->prepare("INSERT INTO produtos (codigo, titulo) VALUES(?,?)");
        $insere_produto->bindParam(1, $linha_produto->codigo, PDO::PARAM_INT);
        $insere_produto->bindParam(2, $linha_produto->titulo, PDO::PARAM_STR);
        $insere_produto->execute();

        $last_id = $pdo->lastInsertId();
        $busca_produto_cores = $pdo->query("SELECT id FROM produtos WHERE id=$last_id");
        $resultado_last_id = $busca_produto_cores->fetch(PDO::FETCH_OBJ);
        //echo "LAST_ID=" . "$resultado_last_id->id" . "<br />";

        $insere_produto_cores = $pdo->prepare("INSERT INTO produtos_cores (id_cor, id_produto) VALUES(?,?)");
        $insere_produto_cores->bindParam(1, $resultado_id_cor->id, PDO::PARAM_INT);
        $insere_produto_cores->bindParam(2, $resultado_last_id->id, PDO::PARAM_INT);
        $insere_produto_cores->execute();

        $insere_produtos_tamanhos = $pdo->prepare("INSERT INTO produtos_tamanhos (id_produto_cor, id_tamanho) VALUES (?,?)");
        $insere_produtos_tamanhos->bindParam(1, $resultado_id_cor->id, PDO::PARAM_INT);
        $insere_produtos_tamanhos->bindParam(2, $resultado_id_tamanho->id, PDO::PARAM_INT);
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


/*busca todos dados antigos a serem migrados
$busca=$pdo->prepare("SELECT * FROM dados_antigos");
$busca->execute();
coloca resultado em um array
$linha = $busca->fetchAll(PDO::FETCH_ASSOC);
var_dump($linha);*/

*/
