<?php
class Mubi
{
    private $codubi;
    private $nomubi;
    private $depubi;

    public function getCodubi()
    {
        return $this->codubi;
    }
    public function setCodubi($codubi)
    {
        $this->codubi = $codubi;
    }
    public function getNomubi()
    {
        return $this->nomubi;
    }
    public function setNomubi($nomubi)
    {
        $this->nomubi = $nomubi;
    }
    public function getDepubi()
    {
        return $this->depubi;
    }
    public function setDepubi($depubi)
    {
        $this->depubi = $depubi;
    }

    public function getAll()
    {
        $res = NULL;
        $sql = "SELECT d.codubi AS cd, d.nomubi AS nd, m.codubi AS cm, m.nomubi AS nm FROM ubi AS m LEFT JOIN ubi AS d ON m.depubi = d.codubi";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getOne(){
        $res = NULL;
        $sql = "SELECT * FROM ubi WHERE codubi=:codubi";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $codubi = $this->getCodubi();
        $result->bindParam(":codubi", $codubi);
        $result->execute();
        $res = $result->fetchall(PDO::FETCH_ASSOC);
        return $res;
    }

    public function save(){
        $sql = "INSERT INTO ubi (nomubi, depubi) VALUES (:nomubi, :depubi)";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $nomubi = $this->getNomubi();
        $depubi = $this->getDepubi();
        $result->bindParam(":nomubi", $nomubi);
        $result->bindParam(":depubi", $depubi);
        $result->execute();
    }

    public function edit(){
        $sql = "UPDATE ubi SET nomubi=:nomubi, depubi=:depubi WHERE codubi=:codubi";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $codubi = $this->getCodubi();
        $nomubi = $this->getNomubi();
        $depubi = $this->getDepubi();
        $result->bindParam(":codubi", $codubi);
        $result->bindParam(":nomubi", $nomubi);
        $result->bindParam(":depubi", $depubi);
        $result->execute();
    }

    public function del(){
        $sql = "DELETE FROM ubi WHERE codubi=:codubi";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        
        $codubi = $this->getCodubi();
        $result->bindParam(":codubi", $codubi);
        $result->execute();
    }

    public function getDep($depubi){
        $resultado = NULL;
        $sql = "SELECT * FROM ubi WHERE depubi=:depubi";
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->bindParam(":depubi", $depubi);
        $result->execute();
        $resultado = $result->fetchall(PDO::FETCH_ASSOC);
        return $resultado;
    }
}
?>