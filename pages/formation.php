<div class="col-10 col-sm-11 mb-4">
  <br>
  <h2 class="d-flex justify-content-center change-opacity-1 font-trebuchet"> A propos de moi</h2>
  <hr>

  <?php
    $posts = get_posts_formation();
    foreach($posts as $post) {
  ?>

  <div class="row m-5">
    <div class="col">
      <h4 class="mb-3 font-trebuchet"><?= $post->title ?></h4>
      <div class="row d-flex justify-content-between">
        <div class=" col-12 col-lg-7 bg-light">
          <?= substr(nl2br($post->content), 0, 1200) ?>...
        </div>
        <div class="card col-12 col-lg-4 bg-light" style="height: 30rem;">
          <img src="img/posts/<?= $post->image ?>" style="height: 22rem;" alt="<?= $post->title ?>">
          <a class="btn btn-primary mt-5 font-trebuchet" href="index.php?page=post&id=<?= $post->id ?>">Lire l'article complet</a>
        </div>
      </div>
    </div>
  </div>

  <?php
  }
  ?>

</div>