<?php include ("controllers/cpro.php");
echo titulo('bi-box2-heart', "Producto", 1);
?>

<div id="ins">
	<form name="frm1" action="#" method="POST" enctype="multipart/form-data">
		<div class="row">
			<div class="form-group col-md-4">
				<label for="nompro">Nombre Prd</label>
				<input type="text" class="form-control form-control" name="nompro" id="nompro" value="<?php if ($dtOne && $dtOne[0]['nompro'])
					echo $dtOne[0]['nompro']; ?>" required>
			</div>
			<div class="form-group col-md-4">
				<label for="prcpro">Precio</label>
				<input type="number" class="form-control form-control" name="prcpro" id="prcpro" value="<?php if ($dtOne && $dtOne[0]['prcpro'])
					echo $dtOne[0]['prcpro']; ?>" required>
			</div>
			<div class="form-group col-md-4">
				<label for="imgpro">Imagen</label>
				<input type="file" class="form-control form-control" name="fots" id="imgpro" accept="image/*">
				<input type="hidden" name="imgpro" value="<?php if($dtOne && $dtOne[0]['imgpro']) echo $dtOne[0]['imgpro']; ?>">
			</div>
			<div class="form-group col-md-8">
				<label for="despro">Descripción</label>
				<textarea class="form-control form-control" name="despro" id="despro" required><?php if ($dtOne && $dtOne[0]['despro'])
					echo $dtOne[0]['despro']; ?></textarea>
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
			<th>Foto</th>
			<th>Id</th>
			<th>Denominación</th>
			<th>Opciones</th>
		</tr>
	</thead>
	<tbody>
		<?php if ($dat) {
			foreach ($dat as $dt) { ?>
				<tr>
					<td>
						<?php if(file_exists($dt['imgpro'])) {?>
							<img src="<?php echo $dt['imgpro']; ?>" width="100" height="100" alt="Artículo">
                        <?php }?>
					</td>
					<td>
						<?= $dt["id"]; ?>
					</td>
					<td>
						<?= $dt["nompro"]; ?>
					</td>
					<td>
						<a class="btn-act" href="home.php?ope=del&id=<?= $dt["id"]; ?>" onclick="return eli();" title="Eliminar"><i
								class="fa-solid fa-trash"></i></a>
						<a class="btn-act" href="home.php?ope=edi&id=<?= $dt["id"]; ?>" title="Editar"><i
								class="fa-solid fa-pen-to-square"></i></a>
					</td>
				</tr>
			<?php }
		} ?>
	</tbody>
</table>