<?php
include_once("conect.php");
$pdo = conectar();


        while ($linha_tamanhos = $busca_tamanhos->fetch(PDO::FETCH_OBJ)){
        $verifica_duplicado_tamanhos = $pdo->query("SELECT titulo FROM tamanhos WHERE titulo=$linha_tamanhos->tamanho");
        if ($verifica_duplicado_tamanhos->rowCount() == 0) {
            $insere_tamanhos = $pdo->prepare("INSERT INTO tamanhos (titulo) VALUES(?)");
            $insere_tamanhos->bindParam(1, $linha_tamanhos->tamanho, PDO::PARAM_INT);
            $insere_tamanhos->execute();
        }
    }
        $busca_cor = $pdo->query("SELECT cor FROM dados_antigos");
        while ($linha_cor = $busca_cor->fetch(PDO::FETCH_OBJ)) {
            $verifica_duplicado_cor = $pdo->query("SELECT titulo FROM cores WHERE titulo='$linha_cor->cor'");
            if ($verifica_duplicado_cor->rowCount() == 0) {
                $insere_cor = $pdo->prepare("INSERT INTO cores (titulo) VALUES(?)");
                $insere_cor->bindParam(1, $linha_cor->cor, PDO::PARAM_STR);
                $insere_cor->execute();
            }
        }
            $busca_produto = $pdo->query("SELECT codigo, titulo, cor, tamanho FROM dados_antigos");
        while ($linha_produto = $busca_produto->fetch(PDO::FETCH_OBJ)){
            $busca_id_cor = $pdo->query("SELECT id FROM cores WHERE titulo='$linha_produto->cor'");
            $resultado_id_cor = $busca_id_cor->fetch(PDO::FETCH_OBJ);

            $busca_id_tamanho = $pdo->query("SELECT id FROM tamanhos WHERE titulo=$linha_produto->tamanho");
            $resultado_id_tamanho = $busca_id_tamanho->fetch(PDO::FETCH_OBJ);

            $insere_produto = $pdo->prepare("INSERT INTO produtos (codigo, titulo) VALUES(?,?)");
            $insere_produto->bindParam(1, $linha_produto->codigo, PDO::PARAM_INT);
            $insere_produto->bindParam(2, $linha_produto->titulo, PDO::PARAM_STR);
            $insere_produto->execute();

            $last_id = $pdo->lastInsertId();
            $busca_produto_cores = $pdo->query("SELECT id FROM produtos WHERE id=$last_id");
            $resultado_last_id = $busca_produto_cores->fetch(PDO::FETCH_OBJ);

            $insere_produto_cores = $pdo->prepare("INSERT INTO produtos_cores (id_cor, id_produto) VALUES(?,?)");
            $insere_produto_cores->bindParam(1, $resultado_id_cor->id, PDO::PARAM_INT);
            $insere_produto_cores->bindParam(2, $resultado_last_id->id, PDO::PARAM_INT);
            $insere_produto_cores->execute();

            $insere_produtos_tamanhos = $pdo->prepare("INSERT INTO produtos_tamanhos (id_produto_cor, id_tamanho) VALUES (?,?)");
            $insere_produtos_tamanhos->bindParam(1, $resultado_id_cor->id, PDO::PARAM_INT);
            $insere_produtos_tamanhos->bindParam(2, $resultado_id_tamanho->id, PDO::PARAM_INT);
            $insere_produtos_tamanhos->execute();
    }

