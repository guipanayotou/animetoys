<?php

header('Content-Type: text/html; charset=utf-8');
//includes
include './include/autoload.include.php';
include_once './include/session.include.php';
//objetos


ob_start();


//metas
$title = 'Erro 404 - Página Não encontrada |  Anime Toys';
$description = 'Ops, a página que você procura não foi encontrada';
$keywords = 'palavras chave';

include './layout/page/error/404.page.php';
$corpo = ob_get_clean();
include './layout/page/mestre.page.php';
