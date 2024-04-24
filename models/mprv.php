<?php
class Mprv
{
    private $idprv;
    private $nit;
    private $nomprv;
    private $razsc;
    private $dirprv;
    private $telprv;
    private $codubi;
    private $corprv;
    public function getIdprv()
    {
        return $this->idprv;
    }
    public function getNit()
    {
        return $this->nit;
    }

    public function getNomprv()
    {
        return $this->nomprv;
    }
    public function getRazSc()
    {
        return $this->razsc;
    }
    public function getDirprv()
    {
        return $this->dirprv;
    }
    public function getTelprv()
    {
        return $this->telprv;
    }
    public function getCodubi()
    {
        return $this->codubi;
    }
    public function getCorprv()
    {
        return $this->corprv;
    }
    public function setIdprv($idprv)
    {
        $this->idprv = $idprv;
    }

    public function setNit($nit)
    {
        $this->nit = $nit;
    }
    public function setNomprv($nomprv)
    {
        $this->nomprv = $nomprv;
    }
    public function setRazsc($razsc)
    {
        $this->razsc = $razsc;
    }
    public function setDirprv($dirprv)
    {
        $this->dirprv = $dirprv;
    }
    public function setTelprv($telprv)
    {
        $this->telprv = $telprv;
    }
    public function setCodubi($codubi)
    {
        $this->codubi = $codubi;
    }
    public function setCorprv($corprv)
    {
        $this->corprv = $corprv;
    }

    public function getAll()
    {
        $res = NULL;
        $sql = "SELECT v.idprv, v.nit, v.dirprv, v.razsc, v.codubi AS cm, m.nomubi AS nm, d.codubi AS cd, d.nomubi AS nd, v.corprv, v.telprv, v.nomprv  FROM prv AS v INNER JOIN ubi AS m ON v.codubi = m.codubi INNER JOIN ubi AS d ON m.depubi=d.codubi";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }
    public function getOne()
    {
        $res = NULL;
        $sql = "SELECT v.idprv, v.nit, v.dirprv, v.razsc, v.codubi AS cm, m.nomubi AS nm, d.codubi AS cd, d.nomubi AS nd, v.corprv, v.telprv, v.nomprv  FROM prv AS v INNER JOIN ubi AS m ON v.codubi = m.codubi INNER JOIN ubi AS d ON m.depubi=d.codubi WHERE v.idprv=:idprv";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idprv = $this->getIdprv();
        $result->bindParam(":idprv", $idprv);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }
    public function save()
    {
        $sql = "INSERT INTO prv (nit, nomprv, razsc, dirprv, telprv, codubi, corprv) VALUES (:nit, :nomprv, :razsc, :dirprv, :telprv, :codubi, :corprv)";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $nit = $this->getNit();
        $result->bindParam(":nit", $nit);
        $nomprv = $this->getNomprv();
        $result->bindParam(":nomprv", $nomprv);
        $razsc = $this->getRazSc();
        $result->bindParam(":razsc", $razsc);
        $dirprv = $this->getDirprv();
        $result->bindParam(":dirprv", $dirprv);
        $telprv = $this->getTelprv();
        $result->bindParam(":telprv", $telprv);
        $codubi = $this->getCodubi();
        $result->bindParam(":codubi", $codubi);
        $corprv = $this->getCorprv();
        $result->bindParam(":corprv", $corprv);
        $result->execute();
    }
    public function edit()
    {
        $sql = "UPDATE prv SET nit=:nit, nomprv=:nomprv, razsc=:razsc, dirprv=:dirprv, telprv=:telprv, codubi=:codubi, corprv=:corprv WHERE idprv=:idprv";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idprv = $this->getIdprv();
        $result->bindParam(":idprv", $idprv);
        $nit = $this->getNit();
        $result->bindParam(":nit", $nit);
        $nomprv = $this->getNomprv();
        $result->bindParam(":nomprv", $nomprv);
        $razsc = $this->getRazSc();
        $result->bindParam(":razsc", $razsc);
        $dirprv = $this->getDirprv();
        $result->bindParam(":dirprv", $dirprv);
        $telprv = $this->getTelprv();
        $result->bindParam(":telprv", $telprv);
        $codubi = $this->getCodubi();
        $result->bindParam(":codubi", $codubi);
        $corprv = $this->getCorprv();
        $result->bindParam(":corprv", $corprv);
        $result->execute();
    }

    public function del()
    {
        $sql = "DELETE FROM prv WHERE idprv=:idprv";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idprv = $this->getIdprv();
        $result->bindParam(":idprv", $idprv);
        $result->execute();
    }
}
