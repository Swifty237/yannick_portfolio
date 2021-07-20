<?php

  if (admin() != 1) {
    header('Location:index.php?page=dashboard');
  }

  $post = get_post();
  if ($post == FALSE) {
    header('Location:index.php?page=error');
  }
  else {

    ?>


</div>

  <div class="card border-bottom-0">
    <img src="../img/posts/<?= $post->image ?>" class="card-img-top" alt="<?= $post->title ?>">
  </div>


  <div class="container-fluid">
  <?php
    if (isset($_POST['submit'])) {

      $title = htmlspecialchars(trim($_POST['title']));
      $content = htmlspecialchars(trim($_POST['content']));
      $posted = isset($_POST['public']) ? 1 : 0;

      edit($title, $content, $posted, $_GET['id']);
      header('Location:index.php?page=post&id='.$_GET['id']);
    }
}    

?>
  <form class="mt-4" method="POST">
    <div class="row">
      <div class="my-3 col-12">
        <label for="title" class="form-label">Titre de l'article</label>
        <input type="text" name="title" id="title" class="form-control" value="<?= $post->title ?>" required>
      </div>

      <div class="mb-3 col-12">
        <label class="mb-3 form-label" for ="content">Contenu de l'article</label>
        <textarea name="content" id="content" class="form-control" required><?= $post->content ?></textarea>
      </div>
    
      <p>Public</p>

      <div class="d-flex col-6">
        <span class="mx-2">Non</span>
        <div class="form-check form-switch">
          <label class="form-check-label" for="public"></label>
          <input class="form-check-input" type="checkbox" id="public" name="public" <?php echo ($post->posted == 1) ? "checked" : "" ?>>
        </div>
        <span>Oui</span>
      </div>

      <div class="col-6 d-flex justify-content-end">
        <button class="btn btn-primary" type="submit" name="submit">Modifier l'article</button>
      </div>
    </div>
  </form>