
  <?php
    if (hasnt_password() == 1) {
      header('Location:index.php?page=password');
    }
  ?>
  
  <div class="col-11">
    <div class="row justify-content-center">
    <h3 class="text-center text-white bg-secondary">Administration</h3>
    <h4 class="text-center my-5">Tableau de bord</h4>
  
  <?php
    $tables = [
  
      'Publications'    => 'posts',
      'Commentaires'    => 'comments',
      'Administrateurs' => 'admins' 
  
    ];
  
    $colors = [
  
      'posts'    => 'success',
      'comments' => 'danger',
      'admins'   => 'primary'
  
    ];

    foreach ($tables as $table_name => $table) {
  ?>
  
  <div class="col-3">
    <div class="card bg-<?= getColor($table, $colors) ?>">
      <div class="card-body text-white">
        <span class="card-title"><?= $table_name ?></span>
        <?php $nbrInTable = inTable($table); ?>
        <h4><?= $nbrInTable[0] ?></h4>
      </div>
    </div>
  </div>
  
  <?php
    }
  ?>
  
  </div>
  <h4 class="text-center mt-5">Commentaires non lus</h4>
  
  <?php
    $comments = get_comments();
  ?>
  
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Article</th>
        <th scope="col">Commentaire</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      
      <?php
        if (!empty($comments)) {
  
        foreach ($comments as $comment) {
  
      ?>
      <tr id="commentaire_<?= $comment->id ?>">
        <td scope="row"><?= $comment->title ?></td>
        <td><?= substr($comment->comment, 0, 100) ?>...</td>
        <td>
          <a href="#" id="<?= $comment->id ?>" class="btn btn-success load-comment" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
              <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
            </svg>
          </a>
          <a href="#" id="<?= $comment->id ?>" class="btn btn-danger delete-comment" type="button">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
          </svg>
          </a>
          <a href="#" class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#comment_<?= $comment->id ?>">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
          </svg>
          </a>
          <div class="modal fade" id="comment_<?= $comment->id ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"><?= $comment->title ?></h5>
                </div>
                <div class="modal-body">
                  <p>Commentaire posté par <strong><?= $comment->name.' ('.$comment->email.' )</strong><br>Le'.date('d/m/Y à H:i', strtotime($comment->date)) ?></p>
                  <p><?= nl2br($comment->comment) ?></p>
                </div>
                <div class="modal-footer">
                  <button type="button" id="<?= $comment->id ?>" class="btn btn-secondary load-comment" data-bs-dismiss="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                      <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                    </svg>
                  </button>
                  <button type="button" id="<?= $comment->id ?>" class="btn btn-secondary delete-comment">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>
</div>

        <?php
        }
      }
      else {

          ?>
            <tr>
              <td></td>
              <td class="text-center">Aucun commentaire à valider</td>
            </tr>

          <?php
        }

         ?>
  </tbody>
</table>
