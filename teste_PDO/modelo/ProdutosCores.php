<?php
class ProdutosCores{
    private $id_cor;
    private $id_produtos;

    public function __construct($id_cor, $id_produtos)
    {
        $this->id_cor = $id_cor;
        $this->id_produtos = $id_produtos;
    }

    public function getIdCor()
    {
        return $this->id_cor;
    }
    public function getIdProdutos()
    {
        return $this->id_produtos;
    }

}