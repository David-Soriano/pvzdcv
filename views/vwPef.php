<?php
include("controllers/cpef.php");
echo titulo('bi-compass', "Perfil", 1);
?>

<div id="ins">
    <form name="frm1" action="#" method="POST">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="nomubi">Perfil</label>
                <input type="text" class="form-control form-control" name="nomper" id="nomper" value="<?php if ($dtOne && $dtOne[0]['nomper']) echo $dtOne[0]['nomper']; ?>" required>
            </div>
            <div class="form-group col-md-4">
                <label for="prcubi">Pagina</label>
                <input type="text" class="form-control form-control" name="pagini" id="pagini" value="<?php if ($dtOne && $dtOne[0]['pagini']) echo $dtOne[0]['pagini']; ?>" required>
            </div>
            <div class="form-group col-md-4">
                <input type="hidden" name="ope" value="save">
                <input type="hidden" name="idper" value="<?php if ($dtOne && $dtOne[0]['idper']) echo $dtOne[0]['idper'] ?>">
                <input type="submit" name="" class="btn btn-primary" value="Enviar">
            </div>
        </div>
    </form>
</div>

<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Perfil</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php if($datAll){ foreach($datAll as $dt) {?>
                <tr>
                    <td>
                        <?=$dt["idper"];?>
                    </td>
                    <td>
                        <?=$dt["pagini"]?>
                    </td>
                    <td>
                        <a href="home.php?pg=8988ope=del&id=<?=$dt["idper"];?>" onclick="return eli();" title="Eliminar"><i class="fa-solid fa-trash"></a>
                        <a href="home.php?pg=8988ope=del&id=<?=$dt["idper"];?>" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                </tr>
            <?php }}?>
    </tbody>

    <tfoot>
        <tr>
            <th>Código</th>
            <th>Municipio/Depto.</th>
            <th></th>
        </tr>
    </tfoot>