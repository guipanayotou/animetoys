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
$produto = new produto();
$produtos = $produto->selectAll();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = NULL;
}

$prod = new produto($id);
$prod->select();

$categoria = new categoria();
$categorias = $categoria->selectAll();

$fornecedor = new fornecedor();
$fornecedores = $fornecedor->selectAll();

if (isset($_POST['submit'])) {
    if ($_POST['nome'] != '' && $_POST['ativo'] != '') {
        $prod->setNome($_POST['nome']);
        $prod->setDescricao($_POST['descricao']);
        $prod->setPreco(str_replace(',', '.', $_POST['preco']));
        $prod->setIdcategoria($_POST['idcategoria']);
        $prod->setEstoque($_POST['estoque']);
        $prod->setIdfornecedor($_POST['idfornecedor']);
        $prod->setAtivo($_POST['ativo']);

        if (isset($_GET['id']))
            $prod->update();
        else
            $prod->insert();

        header("Location: ./produto");
        exit();
    }
}

if (isset($_GET['excluir'])) {
    $exc = new produto($_GET['excluir']);
    $exc->delete();

    header("Location: ./produto");
    exit();
}

//metastags 
$title = 'Produtos | Sistema administrativo';
// incluindo a pagina que eu quero 
include './layout/page/admin/produto.page.php';

// termina o buffer e coloca numa variavel corpo
$corpo = ob_get_clean();

// insere a pagina mestre
include './layout/page/admin/mestre.page.php';
