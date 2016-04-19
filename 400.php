<?php

header('Content-Type: text/html; charset=utf-8');
//includes
include './include/autoload.include.php';
include_once './include/session.include.php';

//objetos


ob_start();


//metas
$title = 'Erro 400 - Temos Um Problema | Anime Toys';
$description = 'Ops, temos um problema, você não é um robô?';
$keywords = 'Palavras Chave';

include './layout/page/error/400.page.php';
$corpo = ob_get_clean();
include './layout/page/mestre.page.php';
