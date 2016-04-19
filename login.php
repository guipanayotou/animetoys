<?php

// define o tipo de codificação da página
header('Content-Type: text/html; charset=utf-8');
//includes necessarios em todas as paginas 
include './include/autoload.include.php';
include_once './include/session.include.php';

// start do buffer
ob_start();
if (isset($_POST['submit'])) {
    if ($_POST['usuario'] != '' && $_POST['senha'] != '') {

        $usuario = new usuario();
        $usuario->setSenha($_POST['senha']);
        $usuario->setUsuario($_POST['usuario']);

        $usuario->selectByUsuarioSenha();

        if ($usuario->getId() != '') {
            $_SESSION['usuario'] = serialize($usuario);
            header("Location: ./usuario");
            exit();
        } else {
            header("Location: ./login?erro=1");
            exit();
        }
    }
}

//metastags 
$title = 'Login | Sistema administrativo';
// incluindo a pagina que eu quero 
// termina o buffer e coloca numa variavel corpo
$corpo = ob_get_clean();
include './layout/page/admin/login.page.php';
