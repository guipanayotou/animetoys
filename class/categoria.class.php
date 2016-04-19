<?php

/*
 * Classe categoria
 */

include_once 'bd/banco.class.php';

class categoria {

    private $id;
    private $nome;
    private $descricao;

    public function __construct($id = '') {
        $this->id = $id;
    }

    public function select() {

        $link = banco::con();
        $this->id = mysqli_real_escape_string($link, $this->id);

        $query = "SELECT * FROM categoria WHERE `id`='{$this->id}'";
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
        $query = "SELECT * FROM categoria";

        $result = mysqli_query($link, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $item = new categoria();
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
        $query = "UPDATE categoria SET 
						`nome` = '$this->nome',
						`descricao` = '$this->descricao' 
						WHERE `id`='$this->id'";

        mysqli_query($link, $query);

        return mysqli_affected_rows($link);
    }

    public function delete() {
        
        $link = banco::con();
        $this->id = mysqli_real_escape_string($link, $this->id);

        $query = "DELETE FROM categoria WHERE `id`='$this->id'";
        mysqli_query($link, $query);

        return mysqli_affected_rows($link);
    }

    public function insert() {


        $link = banco::con();
        $this->nome = mysqli_real_escape_string($link, $this->nome);
        $this->descricao = mysqli_real_escape_string($link, $this->descricao);
        $query = "INSERT INTO categoria (`nome`,`descricao`) VALUES ('$this->nome','$this->descricao');";
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

}

?>