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
$cliente = new cliente();
$clientes = $cliente->selectAll();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = NULL;
}

$cli = new cliente($id);
$cli->select();

if (isset($_POST['submit'])) {
    if ($_POST['nome'] != '' && $_POST['email'] != '') {
        $cli->setNome($_POST['nome']);
        $cli->setTelefone($_POST['telefone']);
        $cli->setEmail($_POST['email']);
        $cli->setEndereco($_POST['endereco']);
        $cli->setCpf(str_replace('-', '', str_replace(',', '', str_replace('.', '', trim($_POST['cpf'])))));
        $cli->setPontos($_POST['pontos']);

        if (isset($_GET['id']))
            $cli->update();
        else
            $cli->insert();

        header("Location: ./cliente");
        exit();
    }
}

if (isset($_GET['excluir'])) {
    $exc = new cliente($_GET['excluir']);
    $exc->delete();

    header("Location: ./cliente");
    exit();
}

//metastags 
$title = 'Clientes | Sistema administrativo';
// incluindo a pagina que eu quero 
include './layout/page/admin/cliente.page.php';

// termina o buffer e coloca numa variavel corpo
$corpo = ob_get_clean();

// insere a pagina mestre
include './layout/page/admin/mestre.page.php';
