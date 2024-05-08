<?php 
require_once("conexion.php");
$usu = isset($_POST['usu']) ? $_POST['usu'] : NULL;
$pass = isset($_POST['pss']) ? $_POST['pss'] : NULL;

if($usu && $pass){
    valida($usu, $pass);
} else{
    red();
}
function valida($usu, $psw){
    $res = ingr($usu, $psw);
    $res =isset($res) ? $res:NULL;
    if($res){
        session_start();
        $_SESSION['idpsn'] = $res[0]['idpsn'];
        $_SESSION['nompsn'] = $res[0]['nompsn'];
        $_SESSION['apepsn'] = $res[0]['apepsn'];
        $_SESSION['idper'] = $res[0]['idper'];
        $_SESSION['nomper'] = $res[0]['nomper'];
        $_SESSION['pagini'] = $res[0]['pagini'];
        $_SESSION['aut'] = 'KSNsAwñ$T23:dfEfdfdfR%I##N%';
        echo "<script>window.location='../home.php';</script>";
    } else{
        red();
    }
}

function red(){
    echo "<script>window.location='../index.php?err=oK';</script>";
}

function ingr($usu, $pass){
$res = NULL;
$pass = sha1(md5('dXoXñ'.$pass));
$sql = "SELECT p.idpsn, p.nompsn, p.apepsn, p.docpsn, p.idper, f.nomper, f.pagini FROM persona AS p INNER JOIN perfil AS f ON p.idper = f.idper WHERE p.actpsn = 1 AND p.emapsn = :emapsn AND p.passpsn = :passpsn";
$modelo = new Conexion();
$conexion = $modelo->get_conexion();
$result = $conexion->prepare($sql);
$result->bindParam(":emapsn", $usu);
$result->bindParam(":passpsn", $pass);
$result->execute();
$res=$result->fetchAll(PDO::FETCH_ASSOC);
return $res;
}
?>