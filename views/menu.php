<?php include("controllers/cmenu.php") ?>
<nav>
    <ul>
        <?php if ($dtAll) {
            foreach ($dtAll as $dt) {
        ?>
        <li>
            <a href="home.php?pg=<?=$dt['idpag'];?>" title="<?=$dt['nompag'];?>">
                <i class="<?=$dt['icopag'];?>"></i>
            </a>
        </li>
        <?php }}?>
        <li>
            <a href="views/vwSal.php" title="Salir" id="btnExit">
                <i class="bi bi-box-arrow-left"></i>
            </a>
        </li>
    </ul>
</nav>