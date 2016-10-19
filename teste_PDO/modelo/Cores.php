<?php
class Cores{
    private $titulo;

    public function __construct($titulo)
    {
        $this->titulo = $titulo;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }

}