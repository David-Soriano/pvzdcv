<?php require_once("models/seg.php");?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MVC PHP MYSQL</title>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">

	<link rel="stylesheet" type="text/css" href="css/estilo.css">

</head>

<body>
	<?php include("models/conexion.php");
	include("controllers/funcion.php");
	$pg = isset($_REQUEST['pg']) ? $_REQUEST['pg'] : NULL; 
	if(!$pg && $_SESSION['pagini']) $pg = $_SESSION['pagini']?>
	<header>
		<?php include("views/header.php"); ?>
	</header>
	<section class="menu">
		<?php include("views/menu.php"); ?>
	</section>
	<section class="conte">
		<?php
		$rut = validar($pg);
		if ($rut) include($rut[0]['rutpag']);
		else echo "<h4>No tiene permisos para ingresar a este sitio</h4>";
		?>
	</section>
	<footer>
		<?php include("views/footer.php"); ?>
	</footer>
</body>
<script type="text/javascript" src="js/java.js"></script>
<script src="js/java(1).js"></script>
</html>