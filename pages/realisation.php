<div class="col-10 mb-5">
  <br>
  <h2 class ="change-opacity-1 font-trebuchet fw-bold ms-5 my-5" style="font-size: 70px">Mes réalisations</h2>
  <hr class="col-12">

  <div class="row justify-content-center">
      
      <?php
        $postCount = 1;
        $posts = get_posts_realisation();

        foreach($posts as $post) {   
      ?>

      <div class="col-12 col-md-8 col-lg-4 mt-5 mx-3 shadow-lg">
        <div class="card bg-light <?= ($postCount % 2) ? 'reveal-1' : 'reveal-2' ?>">
          <img src="img/posts/<?= $post->image ?>" class="card-img-top size-realisation" alt="<?= $post->title ?>">
          <div class="card-body">
            <h5 class="card-title font-trebuchet"><?= $post->title ?></h5>
            <h6 class="card-subtile text-muted font-trebuchet">Le <?= date('d/m/Y à H:i', strtotime($post->date)); ?> par <?= $post->name ?></h6>
            <div class="row card-text d-flex justify-content-between">
              
              <div class="col-7 d-flex align-items-center">
                <a class="font-trebuchet" href="index.php?page=post&id=<?= $post->id ?>">Voir la publication complète</a>
              </div>

              <?php
                $idTarget = $post->id;
              ?>

              <button class="col-1 btn" type="button" data-bs-toggle="collapse" data-bs-target=<?= '#modalId'.$idTarget ?> aria-controls=<?='modalId'.$idTarget ?> aria-expanded="false" aria-label="">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                </svg>
              </button>

              <div class="collapse" id=<?='modalId'.$idTarget ?>>
                <div class="card">
                  <div class="card-body">
                    <p class="text-justify"><?= substr(nl2br($post->content), 0, 500); ?>...</p>
                  </div>
                </div>
              </div>
  
            </div>
          </div>
        </div>
      </div>

      <?php
        $postCount++;
      }
      ?>

  </div>
</div>