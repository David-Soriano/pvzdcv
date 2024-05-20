<?php
class Mpef{
    private $idper;
    private $nomper;
    private $pagini;

	private $idpag;

    function getIdPer(){
        return $this -> idper; 
    }
    function getNomper(){
        return $this -> nomper; 
    }
    function getPagini(){
        return $this -> pagini; 
    }
	function getIdpag(){
		return $this -> idpag;
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
	function setIdpag($idpag){
		$this -> idpag = $idpag;
	}
    function getAll(){
        $res = NULL;
		$sql = "SELECT f.idper, f.nomper, f.pagini, g.nompag, g.icopag FROM perfil AS f INNER JOIN pagina AS g ON f.pagini = g.idpag";
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

	function getCan(){
		$res = NULL;
		$modelo = new Conexion();
		$conexion = $modelo -> get_conexion();
		$sql = "SELECT COUNT(idpag) AS can FROM pagper WHERE idper = :idper";
		$result = $conexion -> prepare($sql);
		$idper = $this->getIdper();
		$result -> bindParam(":idper", $idper);
		$result -> execute();
		$res = $result -> fetchall(PDO::FETCH_ASSOC);
		return $res;
	}

	public function getCanOk(){
		$res = NULL;
		$modelo = new Conexion();
		$conexion = $modelo -> get_conexion();
		$sql = "SELECT COUNT(idpag) AS can FROM pagper WHERE idper = :idper AND idpag = :idpag";
		$result = $conexion -> prepare($sql);
		$idper = $this -> getIdPer();
		$result -> bindParam(":idper", $idper);
		$idpag = $this -> getIdpag();
		$result -> bindParam(":idpag", $idpag);
		$result -> execute();
		$res = $result -> fetchall(PDO::FETCH_ASSOC);
		return $res;
	}
}