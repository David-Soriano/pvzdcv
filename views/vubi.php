<?php include ('controllers/cubi.php');
echo titulo('bi-compass', "Ubicación", 1);
?>

<div id="ins">
    <form name="frm1" action="#" method="POST">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="nomubi">Ubicación</label>
                <input type="text" class="form-control form-control" name="nomubi" id="nomubi" value="<?php if ($dtOne && $dtOne[0]['nomubi'])
                    echo $dtOne[0]['nomubi']; ?>" required>
            </div>
            <div class="form-group col-md-4">
                <label for="prcubi">Dependencia</label>
                <select class="form-control form-select" name="depubi" id="depubi">
                    <option value="0">Sin dependencia</option>
                    <?php if ($dtDtp) {
                        foreach ($dtDtp as $dtD) { ?>
                            <option value="<?= $dtD['codubi']; ?>" <?php if ($dtOne && $dtOne[0]['depubi'] == $dtD['codubi'])
                                echo "selected"; ?>><?= $dtD['nomubi']; ?></option>
                        <?php }
                    } ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <input type="hidden" name="ope" value="save">
                <input type="hidden" name="codubi"
                    value="<?php if ($dtOne && $dtOne[0]['codubi'])
                        echo $dtOne[0]['codubi'] ?>">
                    <input type="submit" name="" class="btn btn-primary" value="Enviar">
                </div>
            </div>
        </form>
    </div>

    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Código</th>
                <th>Ubicación</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php if ($dat) {
                        foreach ($dat as $dt) { ?>
                <tr>
                    <td><?= $dt["cm"]; ?></td>
                    <td><?= $dt["nm"] . " " . $dt["nd"]; ?></td>
                    <td>
                        <a href="index.php?pg=789&ope=del&codubi=<?= $dt["cm"]; ?>" onclick="return eli();" title="Eliminar"><i
                                class="fa-solid fa-trash"></i></a>
                        <a href="index.php?pg=789&ope=edi&codubi=<?= $dt["cm"]; ?>" title="Editar"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                </tr>
            <?php }
                    } ?>
    </tbody>

    <tfoot>
        <tr>
            <th>Código</th>
            <th>Ubicación</th>
            <th></th>
        </tr>
    </tfoot>
</table>