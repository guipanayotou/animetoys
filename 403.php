<?php
header('Content-Type: text/html; charset=utf-8');
//includes
include './include/autoload.include.php';
include_once './include/session.include.php';

ob_start();

//metas
$title = 'Erro 403 - Erro de Acesso |  Anime Toys';
$description = 'Ops, a página ou pasta que você está tentando acessar não é permitida!';
$keywords = 'Palavras chave';

include './layout/page/error/403.page.php';
$corpo = ob_get_clean();
include './layout/page/mestre.page.php';
