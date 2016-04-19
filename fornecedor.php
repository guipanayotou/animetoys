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
$fornecedor = new fornecedor();
$fornecedores = $fornecedor->selectAll();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = NULL;
}

$forn = new fornecedor($id);
$forn->select();

if (isset($_POST['submit'])) {
    if ($_POST['nome'] != '') {
        $forn->setNome($_POST['nome']);
        $forn->setTelefone($_POST['telefone']);
        $forn->setEmail($_POST['email']);
        $forn->setEndereco($_POST['endereco']);
        $forn->setDescricao($_POST['descricao']);

        if (isset($_GET['id']))
            $forn->update();
        else
            $forn->insert();

        header("Location: ./fornecedor");
        exit();
    }
}

if (isset($_GET['excluir'])) {
    $exc = new fornecedor($_GET['excluir']);
    $exc->delete();

    header("Location: ./fornecedor");
    exit();
}

//metastags 
$title = 'Fornecedores | Sistema administrativo';
// incluindo a pagina que eu quero 
include './layout/page/admin/fornecedor.page.php';

// termina o buffer e coloca numa variavel corpo
$corpo = ob_get_clean();

// insere a pagina mestre
include './layout/page/admin/mestre.page.php';
