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
  
  <!-- inject:css -->
  <link rel="stylesheet" href="../resources/css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="../resources/css/login.css">
  
  <!-- Material Design Icons -->
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/6.5.95/css/materialdesignicons.min.css">
  
  <link rel="shortcut icon" href="../resources/images/favicon.png" />
  
  <style>
    .table-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh; /* Ensures the container takes the full height of the viewport */
      margin: 0;
    }
    .btn .mdi {
      color: white; 
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0 table-container">
          <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <h4 class="card-title">Aluno Inscrito no Evento</h4>
            
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>CPF</th>
                  <th>Prontuário</th>
                  <th>Modalidades</th>
                  <th>Câmpus</th>
                  <th>Curso</th>
                  <th>Data de Nascimento</th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td>Matheus</td>
                  <td>YYYYYYYYYYY</td>
                  <td>BVXXXXXXX</td>
                  <td>Vôlei - Handball - Basquete</td>
                  <td>São João da Boa Vista</td>
                  <td>Informática</td>
                  <td>27/02/2009</td>
                </tr>
                    
              </tbody>
            </table>
            
            <div class="mt-3">
              <button class="btn btn-primary btn-lg font-weight-medium auth-form-btn">
                <i class="mdi mdi-printer"></i> Imprimir
              </button>
              <a class="btn btn-primary btn-lg font-weight-medium auth-form-btn" href="../listarAlunosInscritosNoEvento_mod3">  Voltar </a>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- plugins:js -->
  <script src="../resources/vendor/js/vendor.bundle.base.js"></script>
  
  <!-- inject:js -->
  <script src="../resources/js/off-canvas.js"></script>
  <script src="../resources/js/hoverable-collapse.js"></script>
  <script src="../resources/js/template.js"></script>
  <script src="../resources/js/settings.js"></script>
  <script src="../resources/js/todolist.js"></script>
  
</body>

</html>
