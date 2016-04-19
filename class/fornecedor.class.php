<?php

/*
 * Classe fornecedor
 */

include_once 'bd/banco.class.php';

class fornecedor {

    private $id;
    private $nome;
    private $telefone;
    private $endereco;
    private $descricao;
    private $email;

    public function __construct($id = '') {
        $this->id = $id;
    }

    public function select() {

        $link = banco::con();
        $this->id = mysqli_real_escape_string($link, $this->id);

        $query = "SELECT * FROM fornecedor WHERE `id`='{$this->id}'";
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
        $query = "SELECT * FROM fornecedor";

        $result = mysqli_query($link, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $item = new fornecedor();
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
        $this->telefone = mysqli_real_escape_string($link, $this->telefone);
        $this->endereco = mysqli_real_escape_string($link, $this->endereco);
        $this->descricao = mysqli_real_escape_string($link, $this->descricao);
        $this->email = mysqli_real_escape_string($link, $this->email);
        $query = "UPDATE fornecedor SET 
						`nome` = '$this->nome',
						`telefone` = '$this->telefone',
						`endereco` = '$this->endereco',
						`descricao` = '$this->descricao',
						`email` = '$this->email' 
						WHERE `id`='$this->id'";

        mysqli_query($link, $query);

        return mysqli_affected_rows($link);
    }

    public function delete() {

        $link = banco::con();
        $this->id = mysqli_real_escape_string($link, $this->id);

        $query = "DELETE FROM fornecedor WHERE `id`='$this->id'";
        mysqli_query($link, $query);

        return mysqli_affected_rows($link);
    }

    public function insert() {


        $link = banco::con();
        $this->nome = mysqli_real_escape_string($link, $this->nome);
        $this->telefone = mysqli_real_escape_string($link, $this->telefone);
        $this->endereco = mysqli_real_escape_string($link, $this->endereco);
        $this->descricao = mysqli_real_escape_string($link, $this->descricao);
        $this->email = mysqli_real_escape_string($link, $this->email);
        $query = "INSERT INTO fornecedor (`nome`,`telefone`,`endereco`,`descricao`,`email`) VALUES ('$this->nome','$this->telefone','$this->endereco','$this->descricao','$this->email');";
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

    public function setTelefone($telefone = '') {
        $this->telefone = $telefone;
        return true;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setEndereco($endereco = '') {
        $this->endereco = $endereco;
        return true;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setDescricao($descricao = '') {
        $this->descricao = $descricao;
        return true;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setEmail($email = '') {
        $this->email = $email;
        return true;
    }

    public function getEmail() {
        return $this->email;
    }

}

?>