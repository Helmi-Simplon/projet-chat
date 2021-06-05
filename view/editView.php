<form action="index.php" method="POST">
    <div>

        <input type="text" class="form-control" name="idUpdate" value="<?php echo htmlspecialchars($_GET["id"]) ?>" style="width:fit-content" hidden>
    </div>
    <div>
        <label for="pseudoUpdate">Pseudo</label>
        <input type="text" class="form-control" name="pseudoUpdate" value="<?php echo htmlspecialchars($_GET["pseudo"]) ?>" style="width:fit-content">
    </div>
    <div>
        <label for="contentUpdate">Message</label>
        <textarea class="form-control" name="contentUpdate" cols="30" rows="10" style=""><?php echo htmlspecialchars($_GET["content"]) ?></textarea>
    </div>
    <div>
        <input type="submit" name="update" value="Mettre à jour" class="btn n">
        
    </div>
</form>

