<?php

// define o tipo de codificação da página
header('Content-Type: text/html; charset=utf-8');
//includes necessarios em todas as paginas 
include './include/autoload.include.php';
include_once './include/session.include.php';
//verifica se o usuario está logado 
include './include/admin/user-control.include.php';

// start do buffer
ob_start();
$pagina = new pagina();
$paginas = $pagina->selectAll();

if (isset($_POST['submit'])) {

    $paginaEditada = new pagina($_POST['id']);
    $paginaEditada->setTitulo($_POST['titulo']);
    $paginaEditada->setTexto($_POST['texto']);
    $paginaEditada->setMais($_POST['mais']);

    $paginaEditada->update();
    header("Location: editar-paginas");
    exit();
}

//metastags 
$title = 'Editar Páginas | Sistema administrativo';
// incluindo a pagina que eu quero 
include './layout/page/admin/editar-paginas.page.php';

// termina o buffer e coloca numa variavel corpo
$corpo = ob_get_clean();

// insere a pagina mestre
include './layout/page/admin/mestre.page.php';
