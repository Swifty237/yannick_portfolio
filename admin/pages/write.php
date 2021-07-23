<?php

  if (admin() != 1) {
    header('Location:index.php?page=dashboard');
  }

?>

<div class="col-11">

  <div class="row">
    <h3 class="text-center text-white bg-secondary">Administration</h3>
  </div>

  <h4 class="text-center my-4">Poster un article</h4>

  <?php
  
    if (isset($_POST['post'])) {
  
      $title = htmlspecialchars(trim($_POST['title']));
      $content = htmlspecialchars(trim($_POST['content']));
      $posted = isset($_POST['public']) ? 1 : 0;
  
      if (!empty($_FILES['image']['name'])) {
          $file = $_FILES['image']['name'];
          $extensions = ['.png', '.jpg', '.jpeg', '.gif', '.PNG', '.JPG', '.JPEG', '.GIF'];
          $extension = strrchr($file, '.');        
            
          if (!in_array($extension, $extensions)) {
  
              ?>
              <div class="card bg-danger">
                <div class="card-content d-flex justify-content-center my-2">
    
                <?php
                  echo 'Ce fichier n\'est pas au bon format';
                ?>
    
                </div>
              </div>
    
            <?php
          }
          else {
              post($title, $content, $posted);
              post_img($_FILES['image']['tmp_name'], $extension);
          }
           
        }
        else {
          post($title, $content, $posted);
          $id = $db->lastInsertId();
          header('Location:index.php?page=post&id='.$id);
        } 
    }  
  
  ?>

  <form class="container-fluid bg-light" method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="mb-3 col-12">
        <label for="title" class="form-label">Titre de l'article</label>
        <input type="text" name="title" id="title" class="form-control" required>
      </div>
  
      <div class="mb-3 col-12">
      <label class="my-3 form-label" for ="content">Contenu de l'article</label>
      <textarea name="content" id="content" class="form-control h-100 mb-5" required></textarea>
      </div>
  
      <div class="mt-5 mb-3 col-12">
        <label for="image" class="form-label my-3">Image de l'article</label>
        <input type="file" id="image" name="image" class="form-control">
      </div>
      
      <p>Public</p>
  
      <div class="d-flex col-6">
        <span class="mx-2">Non</span>
        <div class="form-check form-switch">
          <label class="form-check-label my-3" for="public"></label>
          <input class="form-check-input" type="checkbox" id="public" name="public">
        </div>
        <span>Oui</span>
      </div>
  
      <div class="col-6 d-flex justify-content-end">
        <button class="btn btn-primary" type="submit" name="post">Publier l'article</button>
      </div>
    </div>
  </form>
</div>