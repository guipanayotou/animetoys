<?php

/*
 * Classe cliente
 */

include_once 'bd/banco.class.php';

class cliente {

    private $id;
    private $nome;
    private $cpf;
    private $telefone;
    private $email;
    private $endereco;
    private $pontos;

    public function __construct($id = '') {
        $this->id = $id;
    }

    public function selectByEmail() {

        $link = banco::con();
        $this->email = mysqli_real_escape_string($link, $this->email);

        $query = "SELECT nome, pontos FROM cliente WHERE email = '{$this->email}'; ";
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

    public function select() {

        $link = banco::con();
        $this->id = mysqli_real_escape_string($link, $this->id);

        $query = "SELECT * FROM cliente WHERE `id`='{$this->id}'";
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
        $query = "SELECT * FROM cliente";

        $result = mysqli_query($link, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $item = new cliente();
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
        $this->cpf = mysqli_real_escape_string($link, $this->cpf);
        $this->telefone = mysqli_real_escape_string($link, $this->telefone);
        $this->email = mysqli_real_escape_string($link, $this->email);
        $this->endereco = mysqli_real_escape_string($link, $this->endereco);
        $this->pontos = mysqli_real_escape_string($link, $this->pontos);
        $query = "UPDATE cliente SET 
						`nome` = '$this->nome',
						`cpf` = '$this->cpf',
						`telefone` = '$this->telefone',
						`email` = '$this->email',
						`endereco` = '$this->endereco',
						`pontos` = '$this->pontos' 
						WHERE `id`='$this->id'";

        mysqli_query($link, $query);

        return mysqli_affected_rows($link);
    }

    public function delete() {
        $link = banco::con();
        
        $this->id = mysqli_real_escape_string($link, $this->id);
        $query = "DELETE FROM cliente WHERE `id`='$this->id'";
        mysqli_query($link, $query);

        return mysqli_affected_rows($link);
    }

    public function insert() {


        $link = banco::con();
        $this->nome = mysqli_real_escape_string($link, $this->nome);
        $this->cpf = mysqli_real_escape_string($link, $this->cpf);
        $this->telefone = mysqli_real_escape_string($link, $this->telefone);
        $this->email = mysqli_real_escape_string($link, $this->email);
        $this->endereco = mysqli_real_escape_string($link, $this->endereco);
        $this->pontos = mysqli_real_escape_string($link, $this->pontos);
        $query = "INSERT INTO cliente (`nome`,`cpf`,`telefone`,`email`,`endereco`,`pontos`) VALUES ('$this->nome','$this->cpf','$this->telefone','$this->email','$this->endereco','$this->pontos');";
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

    public function setCpf($cpf = '') {
        $this->cpf = $cpf;
        return true;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setTelefone($telefone = '') {
        $this->telefone = $telefone;
        return true;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setEmail($email = '') {
        $this->email = $email;
        return true;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEndereco($endereco = '') {
        $this->endereco = $endereco;
        return true;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setPontos($pontos = '') {
        $this->pontos = $pontos;
        return true;
    }

    public function getPontos() {
        return $this->pontos;
    }

}

?>