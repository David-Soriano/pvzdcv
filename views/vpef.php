<?php
include ("controllers/cpef.php");
echo titulo('bi bi-eye', "Vistas", 1);
?>

<div id="ins">
    <form name="frm1" action="#" method="POST">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="nomubi">Perfil</label>
                <input type="text" class="form-control form-control" name="nomper" id="nomper" value="<?php if ($dtOne && $dtOne[0]['nomper'])
                    echo $dtOne[0]['nomper']; ?>" required>
            </div>
            <div class="form-group col-md-4">
                <label for="prcubi">Pagina</label>
                <select class="form-control form-select" name="pagini" id="pagini">
                    <?php if ($datAllpg) {
                        foreach ($datAllpg as $dtp) { ?>
                            <option value="<?= $dtp['idpag']; ?>" <?php if ($dtOne && $dtOne[0]['pagini'] == $dtp['idpag'])
                                  echo 'selected'; ?>>
                                <?= $dtp['idpag'] . " - " . $dtp['nompag']; ?>
                            </option>
                        <?php }
                    } ?>
                </select>
            </div>
            <div class="form-group col-md-4">
                <input type="hidden" name="ope" value="save">
                <input type="hidden" name="idper" value="<?php if ($dtOne && $dtOne[0]['idper'])
                    echo $dtOne[0]['idper'] ?>">
                    <input type="submit" name="" class="btn btn-primary" value="Enviar">
                </div>
            </div>
        </form>
    </div>

    <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Perfil</th>
                <th>Página Inicial</th>
                <th>Cantidad Páginas</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($datAll) {
                    foreach ($datAll as $dt) { ?>
                <tr>
                    <td>
                        <?= $dt["idper"]; ?>
                        <?php $mpef->setIdper($dt['idper']);
                        $can = $mpef->getCan();
                        ?>
                    </td>
                    <td>
                        <?= $dt["nomper"] ?>
                    </td>
                    <td>
                        <?= $dt["pagini"] . " - " . $dt["nompag"]; ?>
                    </td>
                    <td>
                        <?= $can[0]['can']; ?>
                    </td>
                    <td>
                        <a class="btn-act" href="home.php?pg=898ope=edi$idper=<?= $dt["idper"]; ?>" title="Editar"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <a class="btn-act" href="#" data-bs-toggle="modal" data-bs-target="#mdP<?= $dt["idper"]; ?>" title="Configurar"><i
                                class="bi bi-card-checklist"></i></a>

                        <div class="modal fade" id="mdP<?= $dt["idper"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Perfil <?= $dt["nomper"]; ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <?php if ($datAllpg) {
                                                foreach ($datAllpg as $dtp) {
                                                    $mpef->setIdper($dt["idper"]);
                                                    $mpef->setIdpag($dtp['idpag']);
                                                    $canOK = $mpef->getCanOK();
                                                    ?>
                                                    <div class="form-group col-md-6">
                                                        <input type="checkbox" name="idpag[]" value="<?= $dtp['idpag']; ?>" <?php if ($canOK && $canOK[0]['can'] > 0)
                                                              echo "checked"; ?>>
                                                        <?= $dtp['idpag'] . " - " . $dtp['nompag']; ?>
                                                    </div>
                                                <?php }
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-primary">Guardar Cambios</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if ($can && $can[0]["can"] == 0) { ?>
                            <a href="home.php?pg=898&ope=del&idper=<?= $dt["idper"]; ?>" onclick="return eli();" title="Eliminar"><i
                                    class="fa-solid fa-trash"></i></a>
                        <?php } ?>
                    </td>
                </tr>
            <?php }
                } ?>
    </tbody>

    <tfoot>
        <tr>
            <th>Id</th>
            <th>Perfil</th>
            <th>Página Inicial</th>
            <th>Cantidad Páginas</th>
            <th>Opciones</th>
        </tr>
    </tfoot>