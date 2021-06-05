<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="margin-top:0px;margin-left:35%">
  <div class="btn-group me-2" role="group" aria-label="First group">
      <?php for($i=1; $i <= $pagination["total_page"];$i++){ ?> 
    <a href="index.php?page=<?= $i ?>" role="button" name="page" class="btn btn-secondary"><?= $i ?></a>
    <?php } ?>
  </div>
  </div>