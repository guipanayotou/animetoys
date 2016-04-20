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
$venda = new venda();
$vendas = $venda->selectAll();

$produto = new produto();
$produtos = $produto->selectAllAtivos();

$usuario = new usuario();
$usuarios = $usuario->selectAllAtivos();

$clien = new cliente();
$clis = $clien->selectAll();


if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = NULL;
}

$vend = new venda($id);
$vend->select();

$c = new cliente();
if ($vend->getIdcliente() != '') {
    $c->setId($vend->getIdcliente());
    $c->select();
}

if (isset($_POST['submit'])) {
    if ($_POST['idproduto'] != '' && $_POST['quantidade'] > 0 && $_POST['desconto'] >= 0) {
        try {
// seleciona o vendedor
            $vend->setIdusuario($_POST['idusuario']);

//trata o desconto
            $_POST['desconto'] = intval($_POST['desconto']);

            if ($_POST['desconto'] > 0) {

                $_POST['desconto'] = str_replace(',', '.', $_POST['desconto']);
                $usuario = new usuario($_POST['idusuario']);
                $usuario->select();

                if ($_POST['desconto'] <= $usuario->getDescontomaximo())
                    $vend->setDesconto($_POST['desconto']);

                else {
                    header("Location: ./venda?erro=1");
                    exit();
                }
            }

// trata os produtos em estoque
            $produto = new produto($_POST['idproduto']);
            $produto->select();

            if ($produto->getEstoque() < $_POST['quantidade']) {
                header("Location: ./venda?erro=2&p=" . $_POST['idproduto']);
                exit();
            }
            $vend->setIdproduto($_POST['idproduto']);
            $vend->setData(date("Y-m-d H:i:s"));

// trata o cliente
            $cli = new cliente();

            if ($_POST['email'] != '') {
                $cli->setEmail($_POST['email']);
                $cli->selectByEmail();

                if ($cli->getId() != '') {
                    $vend->setIdcliente($cli->getId());
                } else {
                    header("Location: ./venda?erro=3");
                    exit();
                }
            }

// trata os pontos
            if ($_POST['pontos'] > 0) {
                if ($cli->getId() != '') {
                    $cli->setPontos($cli->getPontos() + $_POST['pontos']);
                    $cli->update();
                } else {
                    header("Location: ./venda?erro=4");
                    exit();
                }
            }

            if (isset($_GET['id']) && ($logado->getTipo() == 1 || $logado->getTipo() == 2))
                $vend->update();
            else {
                for ($i = 0; $i < $_POST['quantidade']; $i++) {
                    $vend->insert();
                }
                $produto->setEstoque($produto->getEstoque() - $_POST['quantidade']);
                $produto->update();
                // var_dump($vend);
            }


            header("Location: ./venda");
            exit();
        } catch (Exception $exc) {
            header("Location: ./venda?erro=" . $exc->getTraceAsString());
            exit();
        }
    }
}

if (isset($_GET['excluir']) && ($logado->getTipo() == 1 || $logado->getTipo() == 2)) {
    $exc = new venda($_GET['excluir']);
    $exc->delete();

    header("Location: ./venda");
    exit();
}

//metastags 
$title = 'Vendas | Sistema administrativo';
// incluindo a pagina que eu quero 
include './layout/page/admin/venda.page.php';

// termina o buffer e coloca numa variavel corpo
$corpo = ob_get_clean();

// insere a pagina mestre
include './layout/page/admin/mestre.page.php';
