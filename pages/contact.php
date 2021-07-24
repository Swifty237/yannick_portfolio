<div class="col-10 col-sm-11 mb-4">
  <br>
  <h2 class="d-flex justify-content-center change-opacity-1 font-trebuchet">Contact</h2>
  <hr>

  <div class="row justify-content-around">

    <div class="col-12 col-lg-5 bg-light ms-3 reveal-4">
      <div class="mt-4 ms-5">
        <div class="row">
          <p class="fs-5 font-segoe row">Pour me joindre vous pouvez utiliser</p>
          <p class="fs-5 font-segoe row">le numéro de téléphone ou le mail ci dessous</p>
          <p class="fs-5 font-segoe row">sinon merci de remplir le formulaire</p>
        </div>
        <div class="row mt-5">
          <a class="mb-1 font-trebuchet" href="mailto:yannickkamdemkouam@yahoo.fr">yannickkamdemkouam@yahoo.fr</a>
          <a class="font-trebuchet" href="tel:0760034929">07 60 03 49 29</a>
        </div>
      </div>
    </div>

    <?php
      if (isset($_POST['submit'])) {

        $name = htmlspecialchars(trim($_POST['name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $phoneNumber = htmlspecialchars(trim($_POST['phone']));
        $mailContent = htmlspecialchars(trim($_POST['message']));

        send_email($name, $email, $mailContent, $phoneNumber);
      }

    ?>

    <div class="col-12 col-lg-6 change-opacity-1">
      <form method="POST" class="form m-4">
        <div class="row">
          <div class="mb-3 col-12">
            <label for="name" class="font-trebuchet form-label">Nom</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Votre nom ici" required>
          </div>
          <div class="mb-3 col-12">
            <label for="email" class="font-trebuchet form-label">Adresse email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Votre email ici" required>
          </div>
          <div class="mb-3 col-12">
            <label for="phone" class="font-trebuchet form-label">N° téléphone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Votre n° de téléphone ici">
            <span class="text-muted size-text fst-italic">le champ ci dessus n'est pas obligatoire</span>
          </div>
          <div class="mb-3 col-12">
          <label class="font-trebuchet mb-3" for ="message">Message</label>
          <textarea name="message" id="message" style="width : 100%;" class="form-control" placeholder="Votre message ici" required></textarea>
          </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary font-trebuchet ">Envoyer</button>
      </form>
    </div>
  </div>

</div>