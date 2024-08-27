<!DOCTYPE html> 
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> +Saúde São João </title>
    <script src="<?=JQUERY_PATH?>" charset="utf-8"></script>
    <script src="<?=POPPER_PATH?>" charset="utf-8"></script>
    <script src="<?=THEME_JS_PATH?>" charset="utf-8"></script>
    <script src="<?=ANIMATIONS_PATH?>" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="views/modules/CheckUps/hover.css">
    <link rel="stylesheet" href="<?=THEME_CSS_PATH?>">
</head>
<body>
    <?php 
    $vertical_menu_links = [
        "Nome do link"=>"link_de_redirecionamento.html"
    ]; 
    include(VIEWS_PATH.'/module_base.php'); 
    ?>
    <section onclick="closeNav()">   
        <div class="container-fluid">
            <br>
            <h2 class="h01">Adicionar patologias/medicação contínua</h2> 
            <br><br>     
            
            <form  method="post" action="views/modules/Usuarios/conexaoAdicionarPatologias.php" > 
     
                <label for="tipo_cadastro">Tipo cadastro:</label>
                <select required data-validation-required-message="Por favor, selecione uma opção." required class="form-control" id="tipo_cadastro" name = "tipo_cadastro" style="width: 800px">
                    <option value=""> - - - selecione um item - - - </option>
                    <option value="patologia">patologia</option>
                    <option value="medicacao">medicação</option>
                </select>
            
                <br><br>

                <label for="medicacao_patologia">Medicação/Patologia:</label>
                <input type=text required class="form-control" id="medicacao_patologia" name="medicacao_patologia" style="width: 800px">
                <br><br>
 
                <button type="submit" class="btn btn-success">Salvar</button>
                <button type="button" class="btn btn-danger" onclick="javascript:princ()">Cancelar</button> 
               <script>
                   function princ(){
                       document.location = './index.php?mod=home';
                   }
                   </script>
                 
            </form>

        </div> 
    </section>  
    
    <footer class="footer bg-dark text-white">
        <div class="container center ">
            <div class="row justify-content-center ">
                <span>© 2018 - Todos os Direitos Reservados - Mais Saúde São João</span>
                <br>
                <span>Desenvolvido por alunos do <a href="https://sbv.ifsp.edu.br/">Instituto Federal de Educação Ciência e Tecnologia de São Paulo - Campus São João da Boa Vista</a></span>
            </div>
        </div>
    </footer>
</body>
</html>