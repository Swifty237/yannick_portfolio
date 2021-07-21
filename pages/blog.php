<br>
<h3>Mon blog...</h3>
<br>
<hr>

<?php

$posts = get_posts();
foreach($posts as $post) {
  ?>

  <div class="row m-5">
    <div class="col">
      <h4><?= $post->title ?></h4>
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