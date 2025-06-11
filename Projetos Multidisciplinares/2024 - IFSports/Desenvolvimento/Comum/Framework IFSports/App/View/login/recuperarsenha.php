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
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../resources/css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="../resources/css/login.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../resources/images/favicon.png" />
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <center> <img src="../resources/images/welcome/logo.png" alt="logo"> </center>
              </div>
              <h4>Você esqueceu a sua senha?</h4>
              <h6>Basta preencher o seu email para receber um link de redefinição.</h6>
              <form action="/enviarRecuperacaoSenha" method="POST" class="pt-3">
                <div class="form-group">
                  Digite o seu e-mail:
                  <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="E-mail" required>
                </div>
                <div class="mt-3">
                  <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="ENVIAR E-MAIL DE RECUPERAÇÃO">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../resources/vendor/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../resources/js/off-canvas.js"></script>
  <script src="../resources/js/hoverable-collapse.js"></script>
  <script src="../resources/js/template.js"></script>
  <script src="../resources/js/settings.js"></script>
  <script src="../resources/js/todolist.js"></script>
  <!-- endinject -->

  <!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
if (!empty($_SESSION["message_type"]) && !empty($_SESSION["message_text"])) {
    $messageType = $_SESSION["message_type"];
    $messageText = $_SESSION["message_text"];
    echo "<script>
            Swal.fire({
                icon: '$messageType', 
                title: '$messageText',
                background: 'white',
                confirmButtonColor: '#1D8AA7', /* Cor do botão */
                confirmButtonText: 'Entendi!',
                focusConfirm: false,
                customClass: {
                    popup: 'swal-custom-popup',
                    icon: 'swal-custom-icon',
                    title: 'swal-custom-title',
                    confirmButton: 'swal-custom-button'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/login';
                }
            });
        </script>";
    unset($_SESSION["message_type"]);
    unset($_SESSION["message_text"]);
}
?>
</body>

</html>
