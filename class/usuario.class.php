<?php

/*
 * Classe usuario
 */

include_once 'bd/banco.class.php';

class usuario {

    private $id;
    private $usuario;
    private $senha;
    private $nome;
    private $email;
    private $telefone;
    private $tipo;
    private $descontomaximo;

    public function __construct($id = '') {
        $this->id = $id;
    }

    public function select() {

        $link = banco::con();
        $this->id = mysqli_real_escape_string($link, $this->id);

        $query = "SELECT * FROM usuario WHERE `id`='{$this->id}'";
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

    // usado para fazer o login
    public function selectByUsuarioSenha() {

        $link = banco::con();
        $this->usuario = mysqli_real_escape_string($link, $this->usuario);
        $this->senha = sha1(mysqli_real_escape_string($link, trim($this->senha)));

        $query = "SELECT * FROM usuario WHERE usuario = '{$this->usuario}' AND senha = '{$this->senha}' AND tipo <> 4; ";
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
        $query = "SELECT * FROM usuario";

        $result = mysqli_query($link, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $item = new usuario();
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
        $this->usuario = mysqli_real_escape_string($link, $this->usuario);
        $this->nome = mysqli_real_escape_string($link, $this->nome);
        $this->email = mysqli_real_escape_string($link, $this->email);
        $this->telefone = mysqli_real_escape_string($link, $this->telefone);
        $this->tipo = mysqli_real_escape_string($link, $this->tipo);
        $this->descontomaximo = mysqli_real_escape_string($link, $this->descontomaximo);

        if ($this->senha != '' && $this->senha != ' ') {
            $this->senha = sha1(mysqli_real_escape_string($link, trim($this->senha)));
            $query = "UPDATE usuario SET 
						`usuario` = '$this->usuario',
						`senha` = '$this->senha',
						`nome` = '$this->nome',
						`email` = '$this->email',
						`telefone` = '$this->telefone',
						`tipo` = '$this->tipo',
						`descontomaximo` = '$this->descontomaximo' 
						WHERE `id`='$this->id'";
        } else {
            $query = "UPDATE usuario SET 
						`usuario` = '$this->usuario',
						`nome` = '$this->nome',
						`email` = '$this->email',
						`telefone` = '$this->telefone',
						`tipo` = '$this->tipo',
						`descontomaximo` = '$this->descontomaximo' 
						WHERE `id`='$this->id'";
        }

        mysqli_query($link, $query);

        return mysqli_affected_rows($link);
    }

    public function delete() {

        $this->id = mysqli_real_escape_string($this->id);

        $link = banco::con();
        $query = "DELETE FROM usuario WHERE `id`='$this->id'";
        mysqli_query($link, $query);

        return mysqli_affected_rows($link);
    }

    public function insert() {


        $link = banco::con();
        $this->usuario = mysqli_real_escape_string($link, $this->usuario);
        $this->senha = sha1(mysqli_real_escape_string($link, trim($this->senha)));
        $this->nome = mysqli_real_escape_string($link, $this->nome);
        $this->email = mysqli_real_escape_string($link, $this->email);
        $this->telefone = mysqli_real_escape_string($link, $this->telefone);
        $this->tipo = mysqli_real_escape_string($link, $this->tipo);
        $this->descontomaximo = mysqli_real_escape_string($link, $this->descontomaximo);
        $query = "INSERT INTO usuario (`usuario`,`senha`,`nome`,`email`,`telefone`,`tipo`,`descontomaximo`) VALUES ('$this->usuario','$this->senha','$this->nome','$this->email','$this->telefone','$this->tipo','$this->descontomaximo');";
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

    public function setUsuario($usuario = '') {
        $this->usuario = $usuario;
        return true;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setSenha($senha = '') {
        $this->senha = $senha;
        return true;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setNome($nome = '') {
        $this->nome = $nome;
        return true;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setEmail($email = '') {
        $this->email = $email;
        return true;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setTelefone($telefone = '') {
        $this->telefone = $telefone;
        return true;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTipo($tipo = '') {
        $this->tipo = $tipo;
        return true;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setDescontomaximo($descontomaximo = '') {
        $this->descontomaximo = $descontomaximo;
        return true;
    }

    public function getDescontomaximo() {
        return $this->descontomaximo;
    }

}

?>