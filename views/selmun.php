<?php
	include '../models/conexion.php';
	include '../models/mubi.php';

	$valor = $_REQUEST['valor'];
	$html = '';
	$muni = new Mubi();
	$dat = $muni->getDep($valor);
	$html = '<div id="reload">';
		$html .= '<select name="codubi" id="codubi" class="form form-select">';
			if($dat){
				foreach ($dat as $do){
					$html .='<option value="'.$do['codubi'].'">';
						$html.= $do['nomubi'];
					$html .= '</option>';
				}
			}

		$html .= '</select>';
	$html .= '</div>';
	echo $html;
?>