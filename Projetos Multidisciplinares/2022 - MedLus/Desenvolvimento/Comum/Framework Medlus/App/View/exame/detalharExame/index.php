<script>
        var parts = window.location.search.substr(1).split("&");
        var $_GET = {};
        for (var i = 0; i < parts.length; i++) {
            var temp = parts[i].split("=");
            $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
        };
</script>
<?php if(isset($_GET['msg'])){?>
    <?php if(str_ends_with($_GET['msg'], 'Sucesso')){?>
        <script>    
        Swal.fire({title: $_GET['msg'].replace(/_/g," "), icon: "success", showCancelButton: false, showConfirmButton: false,});
        </script>
    <?php } else{?>
    <script>    
        Swal.fire({title: $_GET['msg'].replace(/_/g," "), });
    </script>
<?php } ?>
<?php } ?>


<?php
    //use App\DAO\PacienteDAO;
    use App\DAO\UsuarioDAO;
    //use App\Model\PacienteModel;
    //use App\Model\UsuariosModel;
?>      
<?php $dado = $this->getView()->exame?>
<?php
    /* $usu = new UsuariosModel();
    $usuDAO = new UsuarioDAO();
    $pac = new PacienteModel();
    $pacDAO = new PacienteDAO();
    
    $resPac = $pacDAO->buscarPorId($dado->__get('FK_PACIENTES_PAC_ID'));
    $resUsu = $usuDAO->buscarPorId($resPac['FK_USUARIOS_USU_ID']); */
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-med">Detalhes do Exame: <?php echo $dado->__get("EXA_NOME")?></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center align-items-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nome do Paciente</th>
                        <th>CPF</th>
                        <th>Nome do Exame</th>
                        <th>Data Marcada</th>
                        <th>Hora Marcada</th>
                        <th>Setor de Atendimento</th>
                        <th>Estado do Exame</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $dado->__get("USU_NOME")?></td>
                        <td><?php echo $dado->__get("USU_CPF")?></td>
                        <td><?php echo $dado->__get("EXA_NOME")?></td>
                        <td><?php echo $dado->__get("EXA_DATA_MARCADA")?></td>
                        <td><?php echo $dado->__get("EXA_HORARIO")?></td>
                        <td><?php echo $dado->__get("EXA_SETOR_ATENDIMENTO")?></td>
                        <?php if($dado->__get("EXA_STATUS") == 1){?>
                            <td class="text-success font-weight-bold">Autorizado</td>
                        <?php }elseif($dado->__get("EXA_STATUS") == 0){?>
                            <td class="text-danger font-weight-bold">Recusado</td>
                        <?php }?>
                        <td class="text-nowrap mx-auto">
                            <a  class="btn btn-sm btn-med mx-2"  href="/exame/autorizarexame?id=<?php echo $dado->__get("EXA_ID")?>">
                                <button class="btn btn-sm btn-med mx-2" type="button" id="PopoverCustomT-1">Autorizar</button>
                            </a>
                            <a  class="btn btn-sm btn-danger mx-2"  href="/exame/recusarexame?id=<?php echo $dado->__get("EXA_ID")?>">
                                <button class="btn btn-sm btn-danger mx-2" type="button" id="PopoverCustomT-1">Recusar</button>
                            </a>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th class="text-med">Resultados:</th>
                        <th class="d-flex justify-content-center"> 
                            <form action="./upload?id=<?php echo $dado->__get("EXA_ID")?>" class="d-flex align-items-center text-center " enctype="multipart/form-data" name='upload' method="POST">
                                <label class="input-group-text btn btn-light ml-0" for="resultado">
                                    Upload
                                </label>
                                <input type="file" style="display:none" class="form-control" name="resultado" id="resultado">
                                <a class="btn btn-sm btn-med mx-2" style="height:min-content;">
                                    <button class="btn btn-sm btn-med mx-2" style="height:min-content;" type="submit" id="PopoverCustomT-1">
                                        <i class="fas fa-upload"></i>
                                    </button>
                                </a>
                            </form>
                            <form action="./download?id=<?php echo $dado->__get("EXA_ID")?>" class="d-flex align-items-start " enctype="multipart/form-data" name='download' method="POST">
                                <a class="btn btn-sm btn-success mx-2" style="height:min-content;">
                                    <button class="btn btn-sm btn-success mx-2" style="height:min-content;" type="submit" id="PopoverCustomT-1">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </a>
                            </form>
                        </th>
                    </tr>
                </tfoot>
            </table>
            <a href="./listarexame" class="btn btn-sm" style="height:min-content;">
                <i class="fas fa-angle-left"></i>
            </a>
        </div>
    </div>
</div>