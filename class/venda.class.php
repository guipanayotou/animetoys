<?php 
 /*
*Classe venda
*/

include_once 'bd/banco.class.php'; 

class venda{

	private $id;
	private $idproduto;
	private $idcliente;
	private $data;
	private $desconto;
	private $idusuario;

	public function __construct($id='')
	{
		$this->id = $id;
	}

	public function select()
	{

		$link = banco::con();
		$this->id = mysqli_real_escape_string($link, $this->id);

		$query = "SELECT * FROM venda WHERE `id`='{$this->id}'";
		$result = mysqli_query($link, $query);

		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result) ){
				foreach($row as $key => $value)
				{
					$column_name = str_replace('-','_',$key);
					$this->$column_name = $value;

				}
			}
			return true;
		}
		return false;
	}

	public function selectAll()
	{
		$link = banco::con();
		$list = array();
		$query = "SELECT * FROM venda";

		$result = mysqli_query($link, $query);

		while($row = mysqli_fetch_assoc($result) ){
		$item = new venda();
			foreach($row as $key => $value)
			{
				$column_name = str_replace('-','_',$key);
				$item->$column_name = $value;

			}
		$list[] = $item;
		}
		return $list;
	}

	public function update()
	{


		$link = banco::con();
		$this->idproduto = mysqli_real_escape_string($link, $this->idproduto);
		$this->idcliente = mysqli_real_escape_string($link, $this->idcliente);
		$this->data = mysqli_real_escape_string($link, $this->data);
		$this->desconto = mysqli_real_escape_string($link, $this->desconto);
		$this->idusuario = mysqli_real_escape_string($link, $this->idusuario);
		$query = "UPDATE venda SET 
						`idproduto` = '$this->idproduto',
						`idcliente` = '$this->idcliente',
						`data` = '$this->data',
						`desconto` = '$this->desconto',
						`idusuario` = '$this->idusuario' 
						WHERE `id`='$this->id'";

		mysqli_query($link, $query);

		return mysqli_affected_rows($link);
	}

	public function delete()
	{

		$this->id = mysqli_real_escape_string($this->id);

		$link = banco::con();
		$query = "DELETE FROM venda WHERE `id`='$this->id'";
		mysqli_query($link, $query);

		return mysqli_affected_rows($link);
	}

	public function insert()
	{


		$link = banco::con();
		$this->idproduto = mysqli_real_escape_string($link, $this->idproduto);
		$this->idcliente = mysqli_real_escape_string($link, $this->idcliente);
		$this->data = mysqli_real_escape_string($link, $this->data);
		$this->desconto = mysqli_real_escape_string($link, $this->desconto);
		$this->idusuario = mysqli_real_escape_string($link, $this->idusuario);
		$query ="INSERT INTO venda (`idproduto`,`idcliente`,`data`,`desconto`,`idusuario`) VALUES ('$this->idproduto','$this->idcliente','$this->data','$this->desconto','$this->idusuario');";
		mysqli_query($link, $query);
		$this->id = mysqli_insert_id($link);
	}

	public function setId($id='')
	{
		$this->id = $id;
		return true;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setIdproduto($idproduto='')
	{
		$this->idproduto = $idproduto;
		return true;
	}

	public function getIdproduto()
	{
		return $this->idproduto;
	}

	public function setIdcliente($idcliente='')
	{
		$this->idcliente = $idcliente;
		return true;
	}

	public function getIdcliente()
	{
		return $this->idcliente;
	}

	public function setData($data='')
	{
		$this->data = $data;
		return true;
	}

	public function getData()
	{
		return $this->data;
	}

	public function setDesconto($desconto='')
	{
		$this->desconto = $desconto;
		return true;
	}

	public function getDesconto()
	{
		return $this->desconto;
	}

	public function setIdusuario($idusuario='')
	{
		$this->idusuario = $idusuario;
		return true;
	}

	public function getIdusuario()
	{
		return $this->idusuario;
	}

}
 ?>