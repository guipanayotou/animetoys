<?php

/*
 * Classe produto
 */

include_once 'bd/banco.class.php';

class produto {

    private $id;
    private $nome;
    private $descricao;
    private $preco;
    private $idcategoria;
    private $estoque;
    private $idfornecedor;
    private $ativo;
    private $img1;
    private $img2;
    private $img3;
    private $img4;

    public function __construct($id = '') {
        $this->id = $id;
    }

    public function select() {

        $link = banco::con();
        $this->id = mysqli_real_escape_string($link, $this->id);

        $query = "SELECT * FROM produto WHERE `id`='{$this->id}'";
        $result = mysqli_query($link, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                foreach ($row as $key => $value) {
                    $column_name = str_replace('-', '_', $key);
                    $this->$column_name = $value;
                }
            }
            return true;
        }
        return false;
    }

    public function selectAll() {
        $link = banco::con();
        $list = array();
        $query = "SELECT * FROM produto";

        $result = mysqli_query($link, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $item = new produto();
            foreach ($row as $key => $value) {
                $column_name = str_replace('-', '_', $key);
                $item->$column_name = $value;
            }
            $list[] = $item;
        }
        return $list;
    }

    public function update() {


        $link = banco::con();
        $this->nome = mysqli_real_escape_string($link, $this->nome);
        $this->descricao = mysqli_real_escape_string($link, $this->descricao);
        $this->preco = mysqli_real_escape_string($link, $this->preco);
        $this->idcategoria = mysqli_real_escape_string($link, $this->idcategoria);
        $this->estoque = mysqli_real_escape_string($link, $this->estoque);
        $this->idfornecedor = mysqli_real_escape_string($link, $this->idfornecedor);
        $this->ativo = mysqli_real_escape_string($link, $this->ativo);
        $this->img1 = mysqli_real_escape_string($link, $this->img1);
        $this->img2 = mysqli_real_escape_string($link, $this->img2);
        $this->img3 = mysqli_real_escape_string($link, $this->img3);
        $this->img4 = mysqli_real_escape_string($link, $this->img4);
        $query = "UPDATE produto SET 
						`nome` = '$this->nome',
						`descricao` = '$this->descricao',
						`preco` = '$this->preco',
						`idcategoria` = '$this->idcategoria',
						`estoque` = '$this->estoque',
						`idfornecedor` = '$this->idfornecedor',
						`ativo` = '$this->ativo',
						`img1` = '$this->img1',
						`img2` = '$this->img2',
						`img3` = '$this->img3',
						`img4` = '$this->img4' 
						WHERE `id`='$this->id'";

        mysqli_query($link, $query);

        return mysqli_affected_rows($link);
    }

    public function delete() {

        $link = banco::con();
        $this->id = mysqli_real_escape_string($link, $this->id);


        $query = "DELETE FROM produto WHERE `id`='$this->id'";
        mysqli_query($link, $query);

        return mysqli_affected_rows($link);
    }

    public function insert() {


        $link = banco::con();
        $this->nome = mysqli_real_escape_string($link, $this->nome);
        $this->descricao = mysqli_real_escape_string($link, $this->descricao);
        $this->preco = mysqli_real_escape_string($link, $this->preco);
        $this->idcategoria = mysqli_real_escape_string($link, $this->idcategoria);
        $this->estoque = mysqli_real_escape_string($link, $this->estoque);
        $this->idfornecedor = mysqli_real_escape_string($link, $this->idfornecedor);
        $this->ativo = mysqli_real_escape_string($link, $this->ativo);
        $this->img1 = mysqli_real_escape_string($link, $this->img1);
        $this->img2 = mysqli_real_escape_string($link, $this->img2);
        $this->img3 = mysqli_real_escape_string($link, $this->img3);
        $this->img4 = mysqli_real_escape_string($link, $this->img4);
        $query = "INSERT INTO produto (`nome`,`descricao`,`preco`,`idcategoria`,`estoque`,`idfornecedor`,`ativo`,`img1`,`img2`,`img3`,`img4`) VALUES ('$this->nome','$this->descricao','$this->preco','$this->idcategoria','$this->estoque','$this->idfornecedor','$this->ativo','$this->img1','$this->img2','$this->img3','$this->img4');";
        mysqli_query($link, $query);
        $this->id = mysqli_insert_id($link);
    }

    public function setId($id = '') {
        $this->id = $id;
        return true;
    }

    public function getId() {
        return $this->id;
    }

    public function setNome($nome = '') {
        $this->nome = $nome;
        return true;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setDescricao($descricao = '') {
        $this->descricao = $descricao;
        return true;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setPreco($preco = '') {
        $this->preco = $preco;
        return true;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setIdcategoria($idcategoria = '') {
        $this->idcategoria = $idcategoria;
        return true;
    }

    public function getIdcategoria() {
        return $this->idcategoria;
    }

    public function setEstoque($estoque = '') {
        $this->estoque = $estoque;
        return true;
    }

    public function getEstoque() {
        return $this->estoque;
    }

    public function setIdfornecedor($idfornecedor = '') {
        $this->idfornecedor = $idfornecedor;
        return true;
    }

    public function getIdfornecedor() {
        return $this->idfornecedor;
    }

    public function setAtivo($ativo = '') {
        $this->ativo = $ativo;
        return true;
    }

    public function getAtivo() {
        return $this->ativo;
    }

    public function setImg1($img1 = '') {
        $this->img1 = $img1;
        return true;
    }

    public function getImg1() {
        return $this->img1;
    }

    public function setImg2($img2 = '') {
        $this->img2 = $img2;
        return true;
    }

    public function getImg2() {
        return $this->img2;
    }

    public function setImg3($img3 = '') {
        $this->img3 = $img3;
        return true;
    }

    public function getImg3() {
        return $this->img3;
    }

    public function setImg4($img4 = '') {
        $this->img4 = $img4;
        return true;
    }

    public function getImg4() {
        return $this->img4;
    }

}

?>