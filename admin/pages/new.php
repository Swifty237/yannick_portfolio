<?php
    if (isset($_SESSION['admin'])) {
        header('Location:index.php?page=dashboard');
    }
?>

<div class="col-12">
    <div class="row">
        <h3 class="text-center text-white bg-secondary">Administration</h3>
    </div>
    <div class="row mt-5 justify-content-center">
        <div class="col-8 col-sm-6 col-lg-4">
            <div class="card">
                <div class="row">
                    <div class="col d-flex justify-content-center">
                        <img class="w-25 mt-4" src="../img/admin2.png" alt="Administrateur">
                    </div>
                </div>
                <h4 class="text-center my-4">Se connecter</h4>

                <?php

                    if (isset($_POST['submit'])) {

                      $email = htmlspecialchars(trim($_POST['email']));
                      $token = htmlspecialchars(trim($_POST['token']));

                      $errors = [];

                      if (empty($email) || empty($token)) {

                          $errors['empty'] = 'Tous les champs n\'ont pas été remplis';
                      }

                      if (is_modo($email, $token) == 0) {

                          $errors['exist'] = 'Code unique ou adresse email incorrect';
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

                          $_SESSION['admin'] = $email;
                          header('Location:index.php?page=password');                 
                      }
                    }

                ?>

                <form class="form" method="POST">
                    <div class="row justify-content-center">
                        <div class="col-10 mb-3">
                            <label class="form-label" for="email">Adresse email</label>
                            <input class= "form-control" type="email" id="email" name="email" required>
                        </div>
                        <div class="col-10 mb-3">
                            <label class="form-label" for="token">Code unique</label>
                            <input class= "form-control" type="text" id="token" name="token" required>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2" name="submit">
                            Se connecter
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                        </button>
                        <p class="my-3 d-flex justify-content-center">
                            <a href="index.php?page=login">Déjà modérateur</a>
                        </p>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>