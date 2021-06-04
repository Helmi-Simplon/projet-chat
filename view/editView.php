<form action="index.php" method="POST">
    <div>
        <input type="text" name="idUpdate" value="<?php echo htmlspecialchars($_GET["id"]) ?>" hidden>
    </div>
    <div>
        <input type="text" name="pseudoUpdate" value="<?php echo htmlspecialchars($_GET["pseudo"]) ?>">
    </div>
    <div>
        <textarea name="contentUpdate" cols="30" rows="10"><?php echo htmlspecialchars($_GET["content"]) ?></textarea>
    </div>
    <div>
        <input type="submit" name="update" value="Envoyer">
    </div>
</form>