<?php
// define o tipo de codificação da página
header('Content-Type: text/html; charset=utf-8');
//includes necessarios em todas as paginas 
include './include/autoload.include.php';
include_once './include/session.include.php';

// start do buffer
ob_start();

//metastags 
$title = 'titulo da pagina';
$description = 'descricao';
$keywords = 'palavras chave';

// incluindo a pagina que eu quero 
include './layout/page/inicio.page.php';

// termina o buffer e coloca numa variavel corpo
$corpo = ob_get_clean();

// insere a pagina mestre
include './layout/page/mestre.page.php';
