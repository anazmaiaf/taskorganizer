<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body data-bs-theme="dark">
<section class="h-100 gradient-form">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <h4 class="mt-1 mb-5 pb-1 text-white">Criar conta</h4>
                </div>

                <form method="POST" action="cadastro.php" data-parsley-validate>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label text-white" for="username">Usuário</label>
                    <input name="username" class="form-control" placeholder="Nome de usuário" required/>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label text-white" for="password">Senha</label>
                    <input type="password" name="password" class="form-control" placeholder="Senha" required/>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label text-white" for="email">E-mail</label>
                    <input type="email" name="email" class="form-control" placeholder="E-mail" required/>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" name="submit">Criar Conta
                    </button>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2 text-white">Já tem uma conta?</p>
                    <a class="text-decoration-none" style="color: #00b3b0;" href="../cadastro/cadastroform.php">Criar conta</a>
                  </div>
                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">TaskOrganizer</h4>
                <p class="small mb-0">Somos uma plataforma versátil. Organize seus projetos, crie novas tarefas, organize
                    a sua criatividade de maneira simples e funcional.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../node_modules/jquery/dist/jquery.js"></script>
<script src="../node_modules/parsleyjs/dist/parsley.min.js"></script>
<script src="../node_modules/parsleyjs/dist/i18n/pt-br.js"></script>
<link rel="stylesheet" href="../node_modules/parsleyjs/src/parsley.css">
</body>
</html>