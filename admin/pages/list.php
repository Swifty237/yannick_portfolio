<?php
  if (admin() != 1) {
    header('Location:index.php?page=dashboard');
  }
?>

<div class="col-12 mb-4">
  <div class="row">
    <h3 class="text-center text-white bg-secondary">Administration</h3>
  </div>
  <h4 class="text-center my-3">Listing des articles</h4>
  <hr>
  
  <?php
    $posts = get_posts();
    foreach($posts as $post) {
  ?>

  <div class="row m-5">
    <div class="col">
      <h4 class="mb-3">

        <?php 
          echo $post->title;
          echo ($post->posted == 0) ? '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
          <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
          </svg>' : ''; 
        ?>

      </h4>
      <div class="row d-flex justify-content-between">
        <div class="col-12 col-lg-7 bg-light">
          <?= substr(nl2br($post->content), 0, 1200) ?>...
        </div>
        <div class="card col-12 col-lg-4 bg-light" style="height: 30rem;">
          <img class="card-img-top" src="../img/posts/<?= $post->image ?>" style="height: 22rem;" alt="<?= $post->title ?>">
          <a class="btn btn-primary mt-5" href="index.php?page=post&id=<?= $post->id ?>">Modifier l'article</a>
        </div>
      </div>
    </div>

  </div>
  <?php
        }
  ?>
</div>