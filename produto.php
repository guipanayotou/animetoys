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
$produto = new produto();
$produtos = $produto->selectAll();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = NULL;
}

$prod = new produto($id);
$prod->select();

$categoria = new categoria();
$categorias = $categoria->selectAll();

$fornecedor = new fornecedor();
$fornecedores = $fornecedor->selectAll();

if (isset($_POST['submit'])) {
    if ($_POST['nome'] != '' && $_POST['ativo'] != '') {
//        echo '<pre>';
//        print_r($_POST);
//        echo '</pre>';
//        echo 'Você enviou o arquivo: <strong>' . $_FILES['arquivo']['name'] . '</strong><br />';
//            echo 'Este arquivo é do tipo: <strong > ' . $_FILES['arquivo']['type'] . ' </strong ><br />';
//            echo 'Temporáriamente foi salvo em: <strong>' . $_FILES['arquivo']['tmp_name'] . '</strong><br />';
//            echo 'Seu tamanho é: <strong>' . $_FILES['arquivo']['size'] . '</strong> Bytes<br /><br />';
//
//        
        // verifica se foi enviado um arquivo
        if (isset($_FILES['arquivo']['name']) && $_FILES['arquivo']['error'] == 0) {

            $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
            $nome = $_FILES['arquivo']['name'];

            // Pega a extensao
            $extensao = pathinfo($nome, PATHINFO_EXTENSION);

            // Converte a extensao para mimusculo
            $extensao = strtolower($extensao);

            // Somente imagens, .jpg;.jpeg;.gif;.png
            // Aqui eu enfilero as extesões permitidas e separo por ';'
            // Isso server apenas para eu poder pesquisar dentro desta String
            if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
                // Cria um nome único para esta imagem
                // Evita que duplique as imagens no servidor.
                // Evita nomes com acentos, espaços e caracteres não alfanuméricos
                $novoNome = uniqid(time()) . '.' . $extensao;

                // Concatena a pasta com o nome
                $destino = './layout/img/produtos/' . $novoNome;

                // tenta mover o arquivo para o destino
                if (@move_uploaded_file($arquivo_tmp, $destino)) {
                    
                } else
                    $erro = 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
            } else
                $erro = 'Você poderá enviar apenas arquivos "*.jpg; *.jpeg; *.gif; *.png"<br />';
        }


        $prod->setNome($_POST['nome']);
        $prod->setDescricao($_POST['descricao']);
        $prod->setPreco(str_replace(',', '.', $_POST['preco']));
        $prod->setIdcategoria($_POST['idcategoria']);
        $prod->setEstoque($_POST['estoque']);
        $prod->setIdfornecedor($_POST['idfornecedor']);
        $prod->setPontos($_POST['pontos']);
        $prod->setAtivo($_POST['ativo']);
        if (isset($novoNome))
            $prod->setImg1($novoNome);

        // exit();     


        if (isset($erro) && $erro != '') {
            header("Location: ./produto?erro=" . $erro);
            exit();
        } else {

            if (isset($_GET['id']))
                $prod->update();
            else
                $prod->insert();

            header("Location: ./produto");
            exit();
        }
    }
}

if (isset($_GET['excluir'])) {
    $exc = new produto($_GET['excluir']);
    $exc->delete();

    header("Location: ./produto");
    exit();
}

//metastags 
$title = 'Produtos | Sistema administrativo';
// incluindo a pagina que eu quero 
include './layout/page/admin/produto.page.php';

// termina o buffer e coloca numa variavel corpo
$corpo = ob_get_clean();

// insere a pagina mestre
include './layout/page/admin/mestre.page.php';
