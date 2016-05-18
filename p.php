<?php

// define o tipo de codificação da página
header('Content-Type: text/html; charset=utf-8');
//includes necessarios em todas as paginas 
include './include/autoload.include.php';
include_once './include/session.include.php';

// start do buffer
ob_start();

if (!isset($_GET['id'])) {
    header("Location: ./produtos");
    exit();
}

$produto = new produto();
$produto->setId($_GET['id']);
$produto->select();


if ($produto->getNome() == '') {
    header("Location: ./produtos");
    exit();
}
$categoria = new categoria();
$categorias = $categoria->selectAll();




//metastags 
$title = $produto->getNome() . ' | Anime Toys Sorocaba';
$description = '';
$keywords = 'palavras chave';
//
// incluindo a pagina que eu quero 
include './layout/page/p.page.php';

// termina o buffer e coloca numa variavel corpo
$corpo = ob_get_clean();

// insere a pagina mestre
include './layout/page/mestre.page.php';
