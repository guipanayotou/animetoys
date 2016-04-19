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
$usuario = new usuario();
$usuarios = $usuario->selectAll();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = NULL;
}

$usr = new usuario($id);
$usr->select();

if (isset($_POST['submit']) && isset($_GET['id'])) {
    if ($_POST['usuario'] != '' && $_POST['nome'] != '' && $_POST['tipo'] != '') {
        $usr->setNome($_POST['nome']);
        $usr->setUsuario($_POST['usuario']);
        $usr->setSenha($_POST['senha']);
        $usr->setTelefone($_POST['telefone']);
        $usr->setEmail($_POST['email']);
        $usr->setDescontomaximo($_POST['descontomaximo']);
        $usr->setTipo($_POST['tipo']);

        $usr->update();
        header("Location: ./usuario");
        exit();
    }
} else if (isset($_POST['submit'])) {

    if ($_POST['usuario'] != '' && $_POST['senha'] != '' && $_POST['nome'] != '' && $_POST['tipo'] != '') {
        $usradd = new usuario();
        $usradd->setNome($_POST['nome']);
        $usradd->setUsuario($_POST['usuario']);
        $usradd->setSenha($_POST['senha']);
        $usradd->setTelefone($_POST['telefone']);
        $usradd->setEmail($_POST['email']);
        $usradd->setDescontomaximo($_POST['descontomaximo']);
        $usradd->setTipo($_POST['tipo']);

        $usradd->insert();
        header("Location: ./usuario");
        exit();
    }
}

//metastags 
$title = 'Usuários | Sistema administrativo';
// incluindo a pagina que eu quero 
include './layout/page/admin/usuario.page.php';

// termina o buffer e coloca numa variavel corpo
$corpo = ob_get_clean();

// insere a pagina mestre
include './layout/page/admin/mestre.page.php';
