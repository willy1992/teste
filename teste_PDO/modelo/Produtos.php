<?php
class Produtos{
    private $titulo;
    private $codigo;

 public function __construct($titulo, $codigo)
    {
    $this->titulo = $titulo;
    $this->codigo = $codigo;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }
    public function getCodigo()
    {
        return $this->codigo;
    }
}