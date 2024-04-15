<?php include('models/mprv.php');

$idprv = isset($_REQUEST['idprv']) ? $_REQUEST['idprv'] : NULL;
$nit = isset($_POST['nit']) ? $_POST['nit'] : NULL;
$nomprv = isset($_POST['nomprv']) ? $_POST['nomprv']:NULL;
$razsc = isset($_POST['razsc']) ? $_POST['razsc'] : NULL;
$dirprv = isset($_POST['dirprv']) ? $_POST['dirprv'] : NULL;
$telprv = isset($_POST['telprv']) ? $_POST['telprv'] : NULL;
$codubi = isset($_POST['codubi']) ? $_POST['codubi'] : NULL;
$corprv = isset($_POST['corprv']) ? $_POST['corprv'] : NULL;
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope'] : NULL;

$mprv = new Mprv();
$mprv->setIdprv($idprv);
if($ope == "save"){
    $mprv->setNit($nit);
    $mprv->setNomprv($nomprv);
    $mprv->setRazsc($razsc);
    $mprv->setDirprv($dirprv);
    $mprv->setTelprv($telprv);
    $mprv->setCodubi($codubi);
    $mprv->setCorprv($corprv);
    if($idprv) $mprv->edit();
    else $mprv->save();
}

if ($ope=="del" && $idprv) $mprv->del();

if ($ope=="edi" && $idprv) $dtOne = $mprv->getOne(); else $dtOne=NULL;

$dat = $mprv->getAll();
?>