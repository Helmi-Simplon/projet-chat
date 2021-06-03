<form action="/" method="POST">
  <fieldset>

    <div class="row">
      <div class="col-4 form-group">
        <label for="pseudo" class="form-label mt-4" hidden>Pseudo</label>
        <input type="text" name="pseudo" class="form-control" id="pseudo" aria-describedby="pseudo" placeholder="Entrer votre pseudo" required>

      </div>
      <div class="col-8 form-group">
        <label for="message" class="form-label mt-4" hidden>message</label>
        <textarea class="form-control" name="content" id="message" placeholder="Entrer votre message" rows="3" required></textarea>

      </div>

    </div>
    <button type="submit" name="submit" class="btn btn-primary">Envoyer</button>
  </fieldset>

</form>