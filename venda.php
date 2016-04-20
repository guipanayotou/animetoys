<?php

// define o tipo de codificação da página
header('Content-Type: text/html; charset=utf-8');

//includes necessarios em todas as paginas 
include './include/autoload.include.php';
include_once './include/session.include.php';
//verifica se o usuario está logado 
include_once './include/admin/user-control.include.php';

// start do buffer
ob_start();
$categoria = new categoria();
$categorias = $categoria->selectAll();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = NULL;
}

$cat = new categoria($id);
$cat->select();

if (isset($_POST['submit'])) {
    if ($_POST['nome'] != '') {
        $cat->setNome($_POST['nome']);
        $cat->setDescricao($_POST['descricao']);

        if (isset($_GET['id']))
            $cat->update();
        else
            $cat->insert();

        header("Location: ./categoria");
        exit();
    }
}

if (isset($_GET['excluir'])) {
    $exc = new categoria($_GET['excluir']);
    $exc->delete();

    header("Location: ./categoria");
    exit();
}

//metastags 
$title = 'Categorias | Sistema administrativo';
// incluindo a pagina que eu quero 
include './layout/page/admin/categoria.page.php';

// termina o buffer e coloca numa variavel corpo
$corpo = ob_get_clean();

// insere a pagina mestre
include './layout/page/admin/mestre.page.php';
