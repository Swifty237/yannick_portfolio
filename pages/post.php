<?php
  $post = get_posts();
  if($post == false) {
  header('Location:index.php?page=error');
  }
  else {
?>

<div class="col-10 col-sm-11">
  <div class="row card border-bottom-0">
    <img src="img/posts/<?= $post->image ?>" class="card-img-top" alt="<?= $post->title ?>">
    <div class="card-body">
      <h3 class="card-title font-trebuchet"><?= $post->title ?></h3>
      <h6 class="card-subtitle text-muted mb-4 font-trebuchet">Publié le <?= date('d/m/Y à H:i', strtotime($post->date)); ?> par <?= $post->name ?></h6>
      <p class="card-text mx-5" style="text-align : justify;"><?= nl2br($post->content) ?></p>
    </div>
  </div>

  <div class="row bg-secondary justify-content-center">

    <?php
    }
    ?>

    <hr>
    <h4 class="text-center my-3 text-white" id="comment">Commentaires</h4>
    <div class="col-10 mb-3">
      <div class="bg-white p-3">

        <?php
          $responses = get_comments();
          if ($responses != FALSE) {
          foreach ($responses as $response) {
        ?>
    
          <blockquote>
            <strong class="font-trebuchet"><?= $response->name ?> (<?= date('d/m/Y', strtotime($response->date)) ?>)</strong>
            <p class="font-trebuchet"><?= nl2br($response->comment) ?></p>
          </blockquote>
            
        <?php
          }
        }
        else {
          echo 'Aucun commentaire publié';
        }
        ?>
    
    
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
              <h5>Attention l'adresse email saisie n'est pas valide</h5>
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
        header('Location:index.php?page=post&id='.$_GET['id'].'#comment');
      }
    } 
    ?>

</div>
<form method="POST" class="m-4">
  <div class="row bg-secondary">
    <h4 class="text-center text-white py-3">Commentez</h4>
    <div class="mb-3 col-12 col-lg-6">
      <label for="name" class="font-trebuchet form-label text-white">Nom</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Votre nom ici" required>
    </div>
    <div class="mb-3 col-12 col-lg-6">
      <label for="email" class="font-trebuchet form-label text-white">Adresse email</label>
      <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Votre adresse email ici" required>
    </div>
    <div class="mb-3 col-12">
      <label class="font-trebuchet mb-3 text-white" for ="comment">commentaire</label>
      <textarea name="comment" id="comment" style="width : 100%;" class="font-trebuchet form-control" placeholder="Votre texte ici" required></textarea>
    </div>
  </div>
  <button type="submit" name="submit" class="font-trebuchet btn btn-primary text-white">Commenter</button>
</form>
</div>
  </div>
</div>