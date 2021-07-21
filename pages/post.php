<?php

$post = get_posts();
if($post == false) {
  header('Location:index.php?page=error');
}
else {
  ?>
    </div>
    <div class="card border-bottom-0">
      <img src="img/posts/<?= $post->image ?>" class="card-img-top" alt="<?= $post->title ?>">
      <div class="card-body">
        <h3 class="card-title"><?= $post->title ?></h3>
        <h6 class="card-subtitle text-muted mb-4">Publié le <?= date('d/m/Y à H:i', strtotime($post->date)); ?> par <?= $post->name ?></h6>
        <p class="card-text mx-5" style="text-align : justify;"><?= nl2br($post->content) ?></p>
      </div>
    </div>
    <div class="container-fluid bg-light">

  <?php
}

?>

<hr>

<h4>Commentaires</h4>

  <?php

    $responses = get_comments();
    if ($responses != FALSE) {

    foreach ($responses as $response) {

    ?>

      <blockquote>
        <strong><?= $response->name ?> (<?= date('d/m/Y', strtotime($response->date)) ?>)</strong>
        <p><?= nl2br($response->comment) ?></p>
      </blockquote>

    <?php

      }
    }
    else {

      echo 'Aucun commentaire publié';
      
    }

  ?>

<h4>Commentez :</h4>

<?php
    if (isset($_POST['submit'])) {
    
      $name = htmlspecialchars(trim($_POST['name']));
      $email = htmlspecialchars(trim($_POST['email']));
      $comment = htmlspecialchars(trim($_POST['comment']));
    
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      
          ?>
              <div class="row d-flex justify-content-center">
                  <div class="col-5">
                      <div class="card bg-light">
                          <div class="card-body">
                              <div class="card-tile d-flex justify-content-center">
                                  <h5>Attention l'adresse email saisie n'est pas valide !</h5>
                              </div>
                              <div class="card-text d-flex justify-content-center">
                                  <p>Merci de saisir une adresse email valide</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
      
      
          <?php
      }
      else {
      
              comment($name, $email, $comment);
              ?>
                  <script>
                      window.location.replace('index.php?page=post&id=<?= $_GET['id'] ?>')
                  </script>
              <?php
      }
    }  
  
  ?>
<form method="POST">
  <div class="row bg-light">
    <div class="mb-3 col-12 col-lg-6">
      <label for="name" class="form-label">Nom</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3 col-12 col-lg-6">
      <label for="email" class="form-label">Adresse email</label>
      <input type="email" class="form-control" id="email" name="email" aria-describedby="email" required>
    </div>
    <div class="mb-3 col-12">
    <label class="mb-3" for ="comment">commentaire</label>
    <textarea name="comment" id="comment" style="width : 100%;" class="form-control" required></textarea>
    </div>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Commenter ce poste</button>
</form>
