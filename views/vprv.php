<?php
echo titulo('bi-truck', "Proveedor", 1);
include("controllers/cprv.php");
?>

<div id="ins">
	<form name="frm1" action="#" method="POST">
		<div class="row">
			<div class="form-group col-md-2 col-2">
				<label for="nomprv">Nombre</label>
				<input type="text" class="form-control form-control" name="nomprv" id="nomprv" value="<?php if ($dtOne && $dtOne[0]['nomprv']) echo $dtOne[0]['nomprv']; ?>" required>
			</div>
			<div class="form-group col-md-2 col-2">
				<label for="nit">Nit</label>
				<input type="number" class="form-control form-control" name="nit" id="nit" value="<?php if ($dtOne && $dtOne[0]['nit']) echo $dtOne[0]['nit']; ?>" required>
			</div>
			<div class="form-group col-md-2 col-3">
				<label for="razsc">Razón Social</label>
				<input type="text" class="form-control form-control" name="razsc" id="razsc" value="<?php if ($dtOne && $dtOne[0]['razsc']) echo $dtOne[0]['razsc']; ?>">
			</div>
			<div class="form-group col-md-3 col-3">
				<label for="telprv">Teléfono</label>
				<input type="number" class="form-control form-control" name="telprv" id="telprv" value="<?php if ($dtOne && $dtOne[0]['telprv']) echo $dtOne[0]['telprv']; ?>" required>
			</div>
			<div class="form-group col-md-3 col-2">
				<label for="corprv">Correo</label>
				<input type="email" class="form-control form-control" name="corprv" id="corprv" value="<?php if ($dtOne && $dtOne[0]['corprv']) echo $dtOne[0]['corprv']; ?>">
			</div>
			<div class="form-group col-md-3 col-3">
				<label for="dirprv">Dirección</label>
				<input type="text" class="form-control form-control" name="dirprv" id="dirprv" value="<?php if ($dtOne && $dtOne[0]['dirprv']) echo $dtOne[0]['dirprv']; ?>">
			</div>
			<div class="form-group col-md-3 col-3">
				<label for="depto">Departamento</label>
				<select class="form-select form-select" name="depto" id="depto" onchange="reloadMun(this.value)">
					<option value="0">Seleccione Departamento</option>
					<?php if ($dep) {
						foreach ($dep as $dp) { ?>
							<option value="<?= $dp['codubi']; ?>" <?php if ($dtOne && $dtOne[0]['cd']) echo "selected"; ?>><?= $dp['nomubi'] ?></option>
					<?php }
					} ?>
				</select>
			</div>
			<div class="form-group col-md-6 col-3" >
				<label for="codubi">Municipio</label>
				<div id="reload">
					<select class="form-select form-select" name="codubi" id="codubi">
						<?php if($dtOne && $dtOne[0]['cm'])
						echo '<option value="'.$dtOne[0]['cm'].'">'.$dtOne[0]['nm'].'</option>';
					else echo '<option value="0">Seleccione Departamento</option>';
					?>
						
					</select>
				</div>
			</div>
			<div class="form-group col-md-4">
				<br>
				<input type="hidden" name="ope" value="save">
				<input type="hidden" name="idprv" value="<?php if ($dtOne && $dtOne[0]['idprv']) echo $dtOne[0]['idprv']; ?>" required>
				<input type="submit" class="btn btn-primary" value="Enviar">
			</div>
		</div>
	</form>
</div>


<table id="example" class="table table-striped" style="width:100%">
	<thead>
		<tr>
			<th>Id</th>
			<th>Asesor - NIT</th>
			<th>Razón Social</th>
			<th>Dirección</th>
			<th>Opciones</th>
		</tr>
	</thead>
	<tbody>
		<?php if ($dat) {
			foreach ($dat as $dt) { ?>
				<tr>
					<td>
						<?= $dt["idprv"]; ?>
					</td>
					<td>
						<?= $dt["nomprv"]; ?> - <?= $dt["nit"]; ?>
					</td>
					<td>
						<?= $dt["razsc"]; ?>
					</td>
					<td>
					<?= $dt["dirprv"];?> <?= $dt["nm"];?> <?= $dt["nd"];?>
					</td>
					<td>
						<a class="btn-act" href="home.php?pg=261&ope=del&idprv=<?= $dt["idprv"]; ?>" onclick="return eli();" title="Eliminar"><i class="fa-solid fa-trash"></i></a>
						<a class="btn-act" href="home.php?pg=261&ope=edi&idprv=<?= $dt["idprv"]; ?>" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
					</td>
				</tr>
		<?php }
		} ?>
	</tbody>
</table>