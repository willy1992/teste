<?php
include("conect.php");
include("select.php");

$pdo = conectar();
$result = $pdo;
var_dump($result);
incluirTamanhos($result);
incluirCores($result);
