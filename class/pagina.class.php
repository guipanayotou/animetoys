<?php

/*
 * Classe pagina
 */

include_once 'bd/banco.class.php';

class pagina {

    private $id;
    private $titulo;
    private $texto;
    private $imagem;
    private $mais;

    public function __construct($id = '') {
        $this->id = $id;
    }

    public function select() {

        $link = banco::con();
        $this->id = mysqli_real_escape_string($link, $this->id);

        $query = "SELECT * FROM pagina WHERE `id`='{$this->id}'";
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
        $query = "SELECT * FROM pagina";

        $result = mysqli_query($link, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $item = new pagina();
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
        $this->titulo = mysqli_real_escape_string($link, $this->titulo);
        $this->texto = mysqli_real_escape_string($link, $this->texto);
        $this->imagem = mysqli_real_escape_string($link, $this->imagem);
        $this->mais = mysqli_real_escape_string($link, $this->mais);
        $query = "UPDATE pagina SET 
						`titulo` = '$this->titulo',
						`texto` = '$this->texto',
						`imagem` = '$this->imagem',
						`mais` = '$this->mais' 
						WHERE `id`='$this->id'";

        mysqli_query($link, $query);

        return mysqli_affected_rows($link);
    }

    public function delete() {

        $this->id = mysqli_real_escape_string($this->id);

        $link = banco::con();
        $query = "DELETE FROM pagina WHERE `id`='$this->id'";
        mysqli_query($link, $query);

        return mysqli_affected_rows($link);
    }

    public function insert() {


        $link = banco::con();
        $this->titulo = mysqli_real_escape_string($link, $this->titulo);
        $this->texto = mysqli_real_escape_string($link, $this->texto);
        $this->imagem = mysqli_real_escape_string($link, $this->imagem);
        $this->mais = mysqli_real_escape_string($link, $this->mais);
        $query = "INSERT INTO pagina (`titulo`,`texto`,`imagem`,`mais`) VALUES ('$this->titulo','$this->texto','$this->imagem','$this->mais');";
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

    public function setTitulo($titulo = '') {
        $this->titulo = $titulo;
        return true;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTexto($texto = '') {
        $this->texto = $texto;
        return true;
    }

    public function getTexto() {
        return $this->texto;
    }

    public function setImagem($imagem = '') {
        $this->imagem = $imagem;
        return true;
    }

    public function getImagem() {
        return $this->imagem;
    }

    public function setMais($mais = '') {
        $this->mais = $mais;
        return true;
    }

    public function getMais() {
        return $this->mais;
    }

}

?>