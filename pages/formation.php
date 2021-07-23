<div class="col-11 mb-4">
  <br>
  <h2 class="d-flex justify-content-center">Mes formations</h2>
  <hr>

  <?php
    $posts = get_posts_formation();
    foreach($posts as $post) {
  ?>

  <div class="row m-5">
    <div class="col">
      <h4 class="mb-3"><?= $post->title ?></h4>
      <div class="row d-flex justify-content-between">
        <div class=" col-12 col-lg-7 bg-light">
          <?= substr(nl2br($post->content), 0, 1200) ?>...
        </div>
        <div class="card col-12 col-lg-4 bg-light">
          <img src="img/posts/<?= $post->image ?>" alt="<?= $post->title ?>">
          <br><br>
          <a class="btn btn-primary" href="index.php?page=post&id=<?= $post->id ?>">Lire l'article complet</a>
        </div>
      </div>
    </div>
  </div>

  <?php
  }
  ?>

</div>