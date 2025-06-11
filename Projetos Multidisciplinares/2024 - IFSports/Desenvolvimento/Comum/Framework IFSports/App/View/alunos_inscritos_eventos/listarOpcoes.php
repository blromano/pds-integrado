<!-- Função dataTable -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
  
<!-- Função dataTable -->

<!-- Função dataTable -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script>
  $(document).ready(function () {
var table = $('#tabela').DataTable({
// Localization
"language": {
"url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
},
"responsive": true
}).draw(true).columns.adjust();
});
</script>
<!-- Função dataTable -->

<style>
  .btn .mdi {
      color: red; 
      
    }
    .my-custom-class {
      background-color: transparent;
    }
</style>
<div class="card-body">
  <div class="table-responsive pt-3">
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex auth px-0">
          <div class="row w-100 mx-0">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos Inscritos no Evento</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h2>Alunos Inscritos no Evento</h2>
</head>
<body>
    <div class="containerzao">
        <div class="event-info-container">
            <h2>Modalidades disponíveis</h2>
            <?php //foreach($this->getView()-> as $) { ?>
                <tr>

                    <td><a href="/dashboard/alunos_inscritos_eventos/listar"><button type="button" class="btn btn-outline-info ">Todos alunos
                        <i class="ti-printer btn-icon-append"></i></button></a>
                    </td>

                    <td><a href="/dashboard/alunos_selecionados/selecionar"><button type="button" class="btn btn-primary btn-lg btn-block">
                        <i class="ti-user"></i>                      
                        <?php echo?></button>
                    </td>

                    <td><a href="/dashboard/alunos_selecionados/selecionar"><button type="button" class="btn btn-primary btn-lg btn-block">
                        <i class="ti-user"></i>                      
                        <?php echo?></button>
                    </td>
                </tr>
        </div>
    </div>
</body>
</html>