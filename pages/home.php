<div class="col-12">

  <div id="home" class="row justify-content-around reveal-3 py-5" style="background-image: url('img/posts/post.png');">
    
    <div class="col-9 col-sm-7 col-md-3 reveal-1 my-5" style="height: 40vw">
      <div class="card">
        <img src="img/posts/profil5.jpg" class="card-img-top" alt="photo de profil">
      </div>
    </div>

    <div class="col-12 col-lg-6 mt-5">
      <div class="row gb-sidebar justify-content-center">
        <div class="my-5">
          <p class="fw-bolder change-opacity-2 font-trebuchet text-center text-white mt-5" style="font-size: 20px">Yannick KAMDEM K.</p>
          <p class="fw-bolder change-opacity-3 font-trebuchet text-center text-white mb-5" style="font-size: 50px">développeur full-stack</p>
        </div>
      </div>
    </div>

  </div>

  <div class="row justify-content-center">
    <div class="col-10 mb-5">

    <br>
    <h2 id="formation" class="ms-5 change-opacity-1 my-5 font-trebuchet fw-bold" style="font-size: 70px">A propos de moi</h2>
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

  </div>

</div>