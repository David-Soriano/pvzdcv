<?php include('controllers/cpro.php');
    echo titulo('bi-compass', "Ubicación", 1);
?>

<div id="ins">
	<form name="frm1" action="#" method="POST">
		<div class="row">
			<div class="form-group col-md-4">
				<label for="nomcli">Nombre Completo</label>
				<input type="text" class="form-control form-control" name="nomcli" id="nomcli" value="<?php if ($dtOne && $dtOne[0]['nomcli'])
					echo $dtOne[0]['nomcli']; ?>" required>
			</div>
			<div class="form-group col-md-4">
				<label for="ciudcli">Ciudad</label>
				<select name="" id="ciudcli">
                    <option value="nn">Seleccione</option>
                    <option value="chia">Chía</option>
                    <option value="tocancipa">Tocancipa</option>
                    <option value="guasca">Guasca</option>
                    <option value="cajica">Cajica</option>
                </select>
			</div>
			<div class="form-group col-md-4">
				<label for="dircli">Dirección</label>
				<input type="text" class="form-control form-control" name="dircli" id="dircli" required>
			</div>
			<div class="form-group col-md-8">
				<label for="descli">Más detalles</label>
				<textarea class="form-control form-control" name="descli" id="descli"><?php if ($dtOne && $dtOne[0]['descli'])
					echo $dtOne[0]['descli']; ?></textarea>
			</div>
			<div class="form-group col-md-4">
				<br>
				<input type="hidden" name="ope" value="save">
				<input type="hidden" name="id" value="<?php if ($dtOne && $dtOne[0]['id'])
					echo $dtOne[0]['id']; ?>" required>
				<input type="submit" class="btn btn-primary" value="Enviar">
			</div>
		</div>
	</form>
</div>

<table id="example" class="table table-striped" style="width:100%">
	<thead>
		<tr>
			<th>Id</th>
			<th>Producto</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php if ($dat) {
			foreach ($dat as $dt) { ?>
				<tr>
					<td>
						<?= $dt["id"]; ?>
					</td>
					<td>
						<?= $dt["nompro"]; ?>
					</td>
					<td>
						<a class="btn-act" href="index.php?ope=del&id=<?= $dt["id"]; ?>" onclick="return eli();" title="Eliminar"><i
								class="fa-solid fa-trash"></i></a>
						<a class="btn-act" href="index.php?ope=edi&id=<?= $dt["id"]; ?>" title="Editar"><i
								class="fa-solid fa-pen-to-square"></i></a>
					</td>
				</tr>
			<?php }
		} ?>
	</tbody>
</table>