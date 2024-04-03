<?php 
class Mpro{
	//atributos
	private $id;
	private $nompro;
	private $despro;
	private $prcpro;
	private $imgpro;
	//metodos get
	public function getId(){
		return $this->id;
	}
	public function getNompro(){
		return $this->nompro;
	}
	public function getDespro(){
		return $this->despro;
	}
	public function getPrcpro(){
		return $this->prcpro;
	}
	public function getImgpro(){
		return $this->imgpro;
	}
	//metodos SET
	public function setId($id){
		$this->id =$id;
	}
	public function setNompro($nompro){
		$this->nompro =$nompro;
	}
	public function setDespro($despro){
		$this->despro =$despro;
	}
	public function setPrcpro($prcpro){
		$this->prcpro =$prcpro;
	}
	public function setImgpro($imgpro){
		$this->imgpro =$imgpro;
	}
	//metodos publicos
	public function getAll(){
		$res = NULL;
		$sql = "SELECT * FROM pro";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res= $result->fetchall(PDO::FETCH_ASSOC);
		return $res;
	}
	public function getOne(){
		$res = NULL;
		$sql = "SELECT * FROM pro WHERE id=:id";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$id = $this->getId();
		$result->bindParam(":id", $id);
		$result->execute();
		$res= $result->fetchall(PDO::FETCH_ASSOC);
		return $res;
	}
	public function save(){
		$sql = "INSERT INTO pro (nompro, despro,prcpro, imgpro) VALUES (:nompro, :despro,:prcpro, :imgpro)";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$nompro = $this->getNompro();
		$result->bindParam(":nompro", $nompro);
		$despro = $this->getDespro();
		$result->bindParam(":despro", $despro);
		$prcpro = $this->getPrcpro();
		$result->bindParam(":prcpro", $prcpro);
		$imgpro = $this->getImgpro();
		$result->bindParam(":imgpro", $imgpro);
		$result->execute();
	}
	public function edit(){
		$sql = "UPDATE pro SET nompro=:nompro, despro=:despro,prcpro=:prcpro, imgpro=:imgpro WHERE id=:id";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$id = $this->getId();
		$result->bindParam(":id", $id);
		$nompro = $this->getNompro();
		$result->bindParam(":nompro", $nompro);
		$despro = $this->getDespro();
		$result->bindParam(":despro", $despro);
		$prcpro = $this->getPrcpro();
		$result->bindParam(":prcpro", $prcpro);
		$imgpro = $this->getImgpro();
		$result->bindParam(":imgpro", $imgpro);
		$result->execute();
	}

	public function del(){
		$sql = "DELETE FROM pro WHERE id=:id";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$id = $this->getId();
		$result->bindParam(":id", $id);
		$result->execute();
	}
}
?>