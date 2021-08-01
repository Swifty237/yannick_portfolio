<?php
  if (admin() != 1) {
    header('Location:index.php?page=dashboard');
  }
?>

<div class="col-12 bg-light">
  <div class="row">
    <h3 class="text-center text-white bg-secondary">Administration</h3>
  </div>

  <h4 class="text-center my-3">Paramètres</h4>

  <div class="row justify-content-around">
    <div class="col-6">
      <h5 class="my-5 text-center">Modérateurs</h5>
      <table class="table table-bordered table-hover">
        <thead class="table-success">
          <tr>
            <th scope="col">Nom</th>
            <th scope="col">Email</th>
            <th scope="col">Rôle</th>
            <th scope="col">validé</th>
          </tr>
        </thead>
        <tbody>

          <?php
            $modos = get_modos();
            foreach ($modos as $modo) {
          ?>

          <tr>
            <th scope="row"><?= $modo->name ?></th>
            <td><?= $modo->email ?></td>
            <td><?= $modo->role ?></td>
            <td <?= (!empty($modo->password)) ? 'class="text-success text-center"' : '"class="text-danger text-center"'?>>
              
              <?php 
                if (!empty($modo->password)) {
                  echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                  </svg>'; 
                }
                else {
                  echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-dash-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                  </svg>';
                } 
              ?>

          </tr>

          <?php
            }
          ?>

        </tbody>
      </table>
    </div>

    <div class="col-5">
      <h5 class="mt-5 mb-4 text-center">Ajouter un modérateur</h5>
      <?php

        if (isset($_POST['submit'])) {

          $name = htmlspecialchars(trim($_POST['name']));
          $email = htmlspecialchars(trim($_POST['email']));
          $email_again = htmlspecialchars(trim($_POST['email_again']));
          $role = htmlspecialchars(trim($_POST['role']));
          $token = token(30);

          $errors = [];

          if ($email != $email_again) {
            $errors['different'] = 'Les adresses emails ne correspondent pas';
          }

          if (email_taken($email)) {
            $errors['taken'] = 'L\' adresse email est déjà assignée à un autre modérateur';
          }

          if (!empty($errors)) {

            ?>
              <div class="card bg-danger">
                <div class="card-body text-white text-center">
                  <?php
                    foreach ($errors as $error) {
                      echo $error.'<br>';
                    }
                  ?>
                </div>
              </div>
            <?php
          }
          else {
            add_modo($name, $email, $token, $role);
          }
        }

      ?>

      <form class="form" method="POST">
      <div class="row">
        <div class="my-3 col-12">
          <label for="name" class="form-label">Nom</label>
          <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3 col-12">
          <label class="mb-3 form-label" for ="email">Adresse email</label>
          <input name="email" id="email" class="form-control" required></input>
        </div>

        <div class="mb-3 col-12">
          <label class="mb-3 form-label" for ="email_again">Répéter l'adresse email</label>
          <input name="email_again" id="email_again" class="form-control" required></input>
        </div>

        <div class="mb-3 col-12">
          <label for="role" class="form-label">Rôle</label>
          <select class="form-select" name="role" id="role" aria-label="choix de la fonction">
            <option value="modo">Modérateur</option>
            <option value="admin">Administrateur</option>
          </select>
        </div>

        <div class="col-12">
          <button class="btn btn-primary" type="submit" name="submit">Ajouter</button>
        </div>
      </div>
    </form>

    </div>
  </div>
</div>