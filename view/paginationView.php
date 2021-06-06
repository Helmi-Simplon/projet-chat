<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="margin-top:0px;margin-left:35%">
    <div class="btn-group me-2" role="group" aria-label="First group">
        <?php if (isset($_GET["page"]) && $_GET["page"] > 1) { ?>
            <a href="index.php?page=<?= ($_GET["page"] - 1) ?>" role="button" class="btn btn-secondary">Précédent</a>
        <?php } else { ?>
            <button type="button" class="btn btn-secondary" disabled>Début</button>
        <?php }
        for ($i = 1; $i <= $pagination["total_page"]; $i++) { ?>
            <a href="index.php?page=<?= $i ?>" role="button" name="page" class="btn btn-secondary"><?= $i ?></a>
        <?php }
        if ($_GET["page"] < $pagination["total_page"]) { ?>
            <a href="index.php?page=<?= ($_GET["page"] + 1) ?>" role="button" class="btn btn-secondary">Suivant</a>
        <?php } else { ?>
            <button type="button" class="btn btn-secondary" disabled>Fin</button>
        <?php } ?>
    </div>
</div>