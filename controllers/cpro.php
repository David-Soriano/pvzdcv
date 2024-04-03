<?php 
include("models/mpro.php");

$id = isset($_REQUEST['id']) ? $_REQUEST['id']:NULL;
$nompro = isset($_POST['nompro']) ? $_POST['nompro']:NULL;
$despro = isset($_POST['despro']) ? $_POST['despro']:NULL;
$prcpro = isset($_POST['prcpro']) ? $_POST['prcpro']:NULL;
$imgpro = isset($_POST['imgpro']) ? $_POST['imgpro']:NULL;
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;

$mpro=new Mpro();
$mpro->setId($id);
if ($ope=="save") {
	$mpro->setNompro($nompro);
	$mpro->setDespro($despro);
	$mpro->setPrcpro($prcpro);
	$mpro->setImgpro($imgpro);
	if($id) $mpro->edit();
	else $mpro->save();
}

if ($ope=="del" && $id) $mpro->del();
if ($ope=="edi" && $id) $dtOne = $mpro->getOne(); else $dtOne=NULL;

$dat=$mpro->getAll();

?>