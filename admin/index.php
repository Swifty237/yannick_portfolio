<?php
//L'appel des pages est géré ici

  include_once '../functions/main-functions.php';

  $pages = scandir('pages');

  if (isset($_GET['page']) && !empty($_GET['page'])) {

    if (in_array($_GET['page'].'.php', $pages)) {
      $page = $_GET['page'];
    }
    else {
      $page = 'error';
    }
  }
  else {
    $page = 'dashboard';
  }

  // L'appel des fonctions pour chaque page est géré ici

  $pages_functions = scandir('functions');

  if (in_array($page.'.func.php', $pages_functions)) {
    include_once 'functions/'.$page.'.func.php';
  }

?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Portfolio | Administration</title>
    <meta name="description" content="">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
  </head>

  <body>
    <div class="row">

      <?php
        if ($page != 'login' && $page != 'new' && !isset($_SESSION['admin'])) {
          header('Location:index.php?page=login');
        }
          ob_start(); // Temporisation des sorties html
          
          include_once 'body/sidebar.php';

          include_once 'pages/'.$page.'.php';

          ob_end_flush(); // exécution des scripts mis en temporisation
        ?>

    </div>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
          integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" 
          crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" 
          integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" 
          crossorigin="anonymous"></script>
    <script src="js/dashboard.func.js"></script>
  </body>
</html>