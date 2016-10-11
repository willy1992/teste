<?php
$busca_tamanhos = $pdo->query("SELECT tamanho FROM dados_antigos");
$busca_cor = $pdo->query("SELECT cor FROM dados_antigos");