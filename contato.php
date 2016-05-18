<?php

// define o tipo de codificação da página
header('Content-Type: text/html; charset=utf-8');
//includes necessarios em todas as paginas 
include './include/autoload.include.php';
include_once './include/session.include.php';

// start do buffer
ob_start();

$pag = new pagina();

$pag->setid(4);
$pag->select();


if (isset($_GET['nome'])) {
    $nome = $_GET['nome'];
    $email = $_GET['email'];
    $telefone = $_GET['telefone'];
    $mensagem = $_GET['mensagem'];


    if ($nome != '' && $email != '' && $mensagem != '') {
        $msg = $mensagem;
        $mensagem = 'Este formulário foi enviado no dia ' . date("d/m/Y") . ' às ' . date("H:i") . ' pelo formulário do site!'
                . '<br /><br />'
                . 'Enviado por: ' . $nome
                . '<br /><br />'
                . 'E-Mail: <a href="mailto:' . $email . '">' . $email . '</a>'
                . '<br /><br />';
        if ($telefone != '')
            $mensagem .= 'Telefone: ' . $telefone . '<br /><br />';
       
        $mensagem .= 'Mensagem: ' . $msg
                . '<br /><br />'
                . '---- Fim da Mensagem! Obrigado por usar o sistema de E-Mail da Twelve Monkeys! ----'
                . '<br /><br />';
       @ $email = new enviaEmail('martinsgustavo275@gmail.com', 'Contato Anime Toys - ' . $nome, $mensagem, $email);
      @  $envio = $email->enviar();
    } else {
        $envio = false;
    }
    echo $envio;
    include './layout/page/blocos/email-enviado.msg.php';

    //return;
}//if



//metastags 
$title = 'Contato | Anime Toys Sorocaba';
$description = 'descricao';
$keywords = 'palavras chave';

// incluindo a pagina que eu quero 
include './layout/page/contato.page.php';

// termina o buffer e coloca numa variavel corpo
$corpo = ob_get_clean();

// insere a pagina mestre
include './layout/page/mestre.page.php';
