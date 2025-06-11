<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../resources/vendors/feather/feather.css">
  <link rel="stylesheet" href="../resources/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../resources/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../resources/css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="../resources/css/login.css">
  <link rel="shortcut icon" href="../resources/images/favicon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

  <!-- SweetAlert CSS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <?php

  // Verifica se há uma mensagem de erro armazenada na sessão
  if (!empty($_SESSION["error_message"])) {
    echo "<script>
        Swal.fire({
            icon: 'error', 
            title: 'Ops... Algo deu errado!',
            html: '<p style=\"color: black; font-size: 22px; margin: 0;\">' + 
                  '" . addslashes($_SESSION["error_message"]) . "' + 
                  '</p>',
            background: 'white',
            confirmButtonColor: '#1D8AA7 ', /* Cor do botão */
            confirmButtonText: 'Tentar novamente',
            focusConfirm: false,
            customClass: {
                popup: 'swal-custom-popup',
                icon: 'swal-custom-icon',
                title: 'swal-custom-title',
                confirmButton: 'swal-custom-button'
            }
        });
    </script>";
    unset($_SESSION["error_message"]);
}
?>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5" style="margin-top:150px">
              <div class="brand-logo">
                <center> <img src="../resources/images/welcome/logo.png" alt="logo"> </center>
              </div>
              <h4>Olá! Seja Bem-Vindo(a) ao IFSports!</h4>
              <h6>Faça o login para continuar.</h6>
              <form action="/logar" class="pt-3" method="POST">
                <div class="form-group">
                  Digite o seu e-mail:
                  <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="E-mail">
                </div>
                <div class="form-group">
                  Digite a sua senha:
                  <input type="password" class="form-control form-control-lg" id="senha" name="senha" placeholder="Senha">
                </div>
                <div class="mt-3">
                  <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="ENTRAR">
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Manter-me conectado(a).
                    </label>
                  </div>
                  <a href="/dashboard/recuperarsenha" class="auth-link text-black">Recuperar minha senha</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Não tem uma conta ainda? <a href="/cadastrar/aluno" class="text-primary">Inscreva-se clicando aqui!</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- plugins:js -->
  <script src="../resources/vendor/js/vendor.bundle.base.js"></script>
  <script src="../resources/js/off-canvas.js"></script>
  <script src="../resources/js/hoverable-collapse.js"></script>
  <script src="../resources/js/template.js"></script>
  <script src="../resources/js/settings.js"></script>
  <script src="../resources/js/todolist.js"></script>
</body>

</html>
