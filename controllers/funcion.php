<?php
function titulo($ico, $tit, $op = 2)
{
    $txt = "";
    $txt .= "<h2>";
    $txt .= '<i class="bi ' . $ico . '"></i>';
    $txt .= " " . $tit;
    $txt .= "</h2>";
    if($op == 1){
        $txt .= "<i class='bi bi-chevron-down btn-add' id='btnadd' title='Desplegar'></i>";
        $txt .= "<i class='bi bi-chevron-up btn-add' id='btnmns' title='Ocultar'></i>";
    }
    return $txt;
}
?>