<?php
header('Content-Type: text/html; charset=utf-8');
//includes
include './include/autoload.include.php';
include_once './include/session.include.php';

//objetos


ob_start();


//metas
$title = 'Erro 500 - Erro no Servidor | Anime Toys';
$description = 'Ops, temos um erro no servidor, isso é mal, muito mal!';
$keywords = 'palavras chave';

include './layout/page/error/500.page.php';
$corpo = ob_get_clean();
include './layout/page/mestre.page.php';
