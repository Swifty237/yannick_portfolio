<?php

    if (hasnt_password() == 0) {
      header('Location:index.php?page=dashboard');
    }

?>

<div class="row mt-5 justify-content-center">
    <div class="col-8 col-sm-6 col-lg-4">
        <div class="card">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <img class="w-25 mt-4" src="../img/admin2.png" alt="Administrateur">
                </div>
            </div>
            <h4 class="text-center my-4">Choisir un mot de passe</h4>

            <?php

                if (isset($_POST['submit'])) {

                  $password = htmlspecialchars(trim($_POST['password']));
                  $password_again = htmlspecialchars(trim($_POST['password_again']));

                  $errors = [];

                  if (empty($password) || empty($password_again)) {

                      $errors['empty'] = 'Tous les champs n\'ont pas été remplis';
                  }

                  if ($password != $password_again) {

                      $errors['different'] = 'Les mots de passes sont différents';
                  }

                  if (!empty($errors)) {

                      ?>

                      <div class="card bg-danger">
                          <div class="card-body text-white">

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

                      update_password($password);
                      header('Location:index.php?page=dashboard');                
                  }
                }

            ?>

            <form method="POST">
                <div class="row justify-content-center">
                    <div class="col-10 mb-3">
                        <label class="form-label" for="password">Mot de passe</label>
                        <input class= "form-control" type="password" id="password" name="password" required>
                    </div>
                    <div class="col-10 mb-3">
                        <label class="form-label" for="password_again">Répéter le mot de passe</label>
                        <input class= "form-control" type="password" id="password_again" name="password_again" required>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2" name="submit">
                        Se connecter
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                    </button>
                </div>
            </form> 
        </div>
    </div>
</div>