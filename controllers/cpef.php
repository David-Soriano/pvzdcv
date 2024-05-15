<?php
include("models/mpef.php");

$idper = isset($_POST['idper']) ? $_POST['idper'] : NULL;
$nomper = isset($_POST['nomper']) ? $_POST['nomper'] : NULL;
$pagini = isset($_POST['pagini']) ? $_POST['_pagini'] : NULL;

$ope = isset($_POST['ope']) ? $_POST['_ope'] : NULL;

$mpef = new Mpef();

$mpef -> setIdPer($idper);

if($ope == "save"){
    $mpef -> setNomper($nomper);
    $mpef -> setPagini($pagini);
    if($idper) $mpef -> edit();
    else $mpef -> save();
}

$m = 2;
if($ope == "edi" && $idper){
    $dtOne = $mpef -> getOne();
    $m = 1;
}

if($ope == "del" && $idper){
    $mpef -> del();
}

$datAll = $mpef -> getAll();