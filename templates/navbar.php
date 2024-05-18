<header class="p-3 mb-3 border-bottom">
            <div class="d-flex">
                    
                <ul class="nav me-lg-auto mb-2 justify-content-center mb-md-0">
                    <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                    <i class="fa-solid fa-bars"></i>
                    </button>
                    <li><a href="../dashboard/index.php" class="nav-link px-2 link-secondary">Home</a></li>
                    <li><a href="../dashboard/projeto.php" class="nav-link px-2 link-secondary">Projetos</a></li>
                    <li><a href="../dashboard/tarefa.php" class="nav-link px-2 link-secondary">Tarefas</a></li>
                </ul>

                <div class="dropdown">
                    
                    <a href="#" class="d-block text-decoration-none dropdown-toggle text-white mt-2" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION['username']?></span>
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="login/logout.php">Sair da conta</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
<div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
  <div class="offcanvas-header">
    <h3 class="offcanvas-title" id="staticBackdropLabel">Menu</h3>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>
        <div class="mt-3">
            <a href="projeto.php" class="text-decoration-none text-light fs-5">Projetos</a>
        </div>
        <div class="mt-3">
            <a href="tarefa.php" class="text-decoration-none text-light fs-5">Tarefas</a>
        </div>
    </div>
  </div>
</div>