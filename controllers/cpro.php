<?php 
include("models/mpro.php");
include("controllers/optimg.php");

$id = isset($_REQUEST['id']) ? $_REQUEST['id']:NULL;
$nompro = isset($_POST['nompro']) ? $_POST['nompro']:NULL;
$despro = isset($_POST['despro']) ? $_POST['despro']:NULL;
$prcpro = isset($_POST['prcpro']) ? $_POST['prcpro']:NULL;
$imgpro = isset($_POST['imgpro']) ? $_POST['imgpro']:NULL;
$ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;
$fots = isset($_FILES['fots']['name']) ? $_FILES['fots']['name'] : NULL;

if($fots){
	$imgpro = opti($_FILES['fots'], 'fot', 'jotos', date('YmdHis'));
}
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

$m = 2;
if ($ope=="del" && $id) $mpro->del();
if ($ope=="edi" && $id){
	$dtOne = $mpro->getOne();
	$m = 1;
} else $dtOne=NULL;

$dat=$mpro->getAll();
?>