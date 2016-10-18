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

