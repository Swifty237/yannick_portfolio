<div class="col-11 mb-5">
  <br>
  <h2 class ="row d-flex justify-content-center"> Mes réalisations</h2>
  <br>
  <div class="row d-flex justify-content-center">
      <?php
      
      $posts = get_posts();
      
      foreach($posts as $post) {   
      ?>
      <div class="col-12 col-lg-4">
        <div class="card bg-light">
          <img src="img/posts/<?= $post->image ?>" class="card-img-top" alt="<?= $post->title ?>">
          <div class="card-body">
            <h5 class="card-title"><?= $post->title ?></h5>
            <h6 class="card-subtile text-muted">Le <?= date('d/m/Y à H:i', strtotime($post->date)); ?> par <?= $post->name ?></h6>
            <div class="row card-text d-flex justify-content-between">
              
              <div class="col-7 d-flex align-items-center"><a href="index.php?page=post&id=<?= $post->id ?>">Voir la publication complète</a></div>
              <?php
                $idTarget = $post->id;
              ?>
              <button class="col-1 btn" type="button" data-bs-toggle="modal" data-bs-target=<?= '#modalId'.$idTarget ?> aria-controls=<?='modalId'.$idTarget ?> aria-expanded="false" aria-label="">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                </svg>
              </button>
  
              
                <div class="modal fade" id=<?= "modalId".$idTarget ?> tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel"><?= $post->title ?></h5>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                          </svg>
                        </button> 
                      </div>
                      <div class="modal-body">
                      <p><?= substr(nl2br($post->content), 0, 1000); ?>...</p>
                      </div>
                      <div class="modal-footer">
                      </div>
                    </div>
                  </div>
                </div>
  
            </div>
          </div>
        </div>
      </div>
      <?php
      }
      ?>
  </div>
</div>