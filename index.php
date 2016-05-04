<?php

// define o tipo de codificação da página
header('Content-Type: text/html; charset=utf-8');
//includes necessarios em todas as paginas 
include './include/autoload.include.php';
include_once './include/session.include.php';

// start do buffer
ob_start();

$pag = new pagina();

$pag->setid(1);
$pag->select();

if (isset($_POST['submit'])) {
    // pegar os valores do formulario, no caso o emal do cara
    $cliente = new cliente();
    $cliente->setEmail($_POST['email']);
    $cliente->selectByEmail();
    if ($cliente->getId() != '') {
        header("Location: ./?pontos=" . $cliente->getPontos());
        exit();
    } else {
        header("Location: ./?erro=1");
        exit();
    }
}




//metastags 
$title = 'Anime Toys Sorocaba';
$description = 'descricao';
$keywords = 'palavras chave';

// incluindo a pagina que eu quero 
include './layout/page/inicio.page.php';

// termina o buffer e coloca numa variavel corpo
$corpo = ob_get_clean();

// insere a pagina mestre
include './layout/page/mestre.page.php';
