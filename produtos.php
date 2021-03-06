<?php

// define o tipo de codificação da página
header('Content-Type: text/html; charset=utf-8');
//includes necessarios em todas as paginas 
include './include/autoload.include.php';
include_once './include/session.include.php';

// start do buffer
ob_start();
$produto = new produto();
$produtos = $produto->selectAllAtivos();

$categoria = new categoria();
$categorias = $categoria->selectAll();

$pag = new pagina();

$pag->setid(3);
$pag->select();


//metastags 
$title = 'Produtos | Anime Toys Sorocaba';
$description = 'descricao';
$keywords = 'palavras chave';

// incluindo a pagina que eu quero 
include './layout/page/produtos.page.php';

// termina o buffer e coloca numa variavel corpo
$corpo = ob_get_clean();

// insere a pagina mestre
include './layout/page/mestre.page.php';
