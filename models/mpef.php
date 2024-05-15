<?php
class Mpef{
    private $idper;
    private $nomper;
    private $pagini;

    function getIdPer(){
        return $this -> idper; 
    }
    function getNomper(){
        return $this -> nomper; 
    }
    function getPagini(){
        return $this -> pagini; 
    }
    function setIdPer($idper){
        $this -> idper = $idper;
    }
    function setNomper($nomper){
        $this -> nomper = $nomper;
    }
    function setPagini($pagini){
        $this -> pagini = $pagini;
    }
    function getAll(){
        $res = NULL;
		$sql = "SELECT * FROM persona WHERE idoer = :idper";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res= $result->fetchall(PDO::FETCH_ASSOC);
		return $res;
    }

    public function getOne(){
		$res = NULL;
		$sql = "SELECT idper, nomper, pagini FROM perfil WHERE idper = :idper";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idper = $this->getIdper();
		$result->bindParam(":idper", $idper);
		$result->execute();
		$res= $result->fetchall(PDO::FETCH_ASSOC);
		return $res;
	}

    public function save(){
		$sql = "INSERT INTO perfil (nomper, pagini) VALUES (:nomper, :pagini)";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$nomper = $this->getNomper();
		$result->bindParam(":nomper", $nomper);
        $nomper = $this->getPagini();
		$result->bindParam(":pagini", $pagini);
		$result->execute();
	}

    public function edit(){
		$sql = "UPDATE perfil SET nomper = :nomper, pagini = :pagini WHERE idper = :idper";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
        $idper = $this->getIdper();
		$result->bindParam(":idper", $idper);
		$nomper = $this->getNomper();
		$result->bindParam(":nomper", $nomper);
        $nomper = $this->getPagini();
		$result->bindParam(":pagini", $pagini);
		$result->execute();
	}

    public function del(){
		$sql = "DELETE FROM perfil WHERE idper = :idper";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
        $idper = $this->getIdper();
		$result->bindParam(":idper", $idper);
		$result->execute();
	}

	function getAllPg(){
        $res = NULL;
		$sql = "SELECT idpag, nompag, icopag FROM pagina";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res= $result->fetchall(PDO::FETCH_ASSOC);
		return $res;
    }
}