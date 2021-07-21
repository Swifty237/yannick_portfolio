<header>
  <nav class="navbar navbar-expand-sm navbar-dark bg-secondary">
      <div class="container-fluid">
          <a class="navbar-brand fs-1 fw-bolder" href="index.php?page=home">Mon portfolio</a>
  
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navDisplay" aria-controls="navDisplay" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"> </span>
          </button>
  
          <div class="collapse navbar-collapse justify-content-end" id="navDisplay">
  
              <ul class="navbar-nav mr-auto">
                <li class=" nav-item">
                  <a class="nav-link <?php echo ($page == 'home')? 'active' : ''; ?>" href="index.php?page=home">Accueil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php echo ($page == 'blog')? 'active' : ''; ?>" href="index.php?page=blog">Blog</a>
                </li>
              </ul>
              
          </div>
      </div>
  </nav>
</header>