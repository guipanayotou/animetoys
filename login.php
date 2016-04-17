<?php
// define o tipo de codificação da página
header('Content-Type: text/html; charset=utf-8');
//includes necessarios em todas as paginas 
include './include/autoload.include.php';
include_once './include/session.include.php';

// start do buffer
ob_start();


//metastags 
$title = 'Login | Sistema administrativo';
// incluindo a pagina que eu quero 


// termina o buffer e coloca numa variavel corpo
$corpo = ob_get_clean();
include './layout/page/admin/login.page.php';