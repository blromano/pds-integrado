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
            <h2 class="h01">Fale conosco</h2> 
            <br><br>     
            
            <form  method="post" action="views/modules/Usuarios/conexaoFaleConosco.php" > 
     
                <label for="assunto">Assunto:</label>
                <input type=text required class="form-control" placeholder="título" id="assunto" name="assunto" style="width: 800px">
                <br><br>
                
                <label for="nome">Nome:</label>
                <input type=text required class="form-control" id="nome" name="nome" style="width: 800px">
                <br><br>
                
                <label for="contato">Contato:</label>
                <input type=tel required class="form-control" id="contato" placeholder="telefone" name="contato" style="width: 800px">
                <br><br>
                
                <label for="email">Email:</label>
                <input type=email required class="form-control" id="email" name="email" style="width: 800px">
                <br><br>
                
                <label for="tipo_mensagem">Tipo de mensagem:</label>
                <select required data-validation-required-message="Por favor, selecione uma opção." required class="form-control" id="tipo_mensagem" name = "tipo_mensagem" style="width: 800px">
                    <option value=""> - - - selecione um item - - - </option>
                    <option value="feedback">feedback</option>
                    <option value="duvida">dúvida</option>
                    <option value="reclamacao">reclamação</option>
                </select>
            
                <br><br>
                
                <label for="mensagem">Mensagem:</label>
                <textarea required class="form-control" id="mensagem" name="mensagem" rows="5" style="width: 800px"></textarea>
                <br><br>
 
                <button type="submit" class="btn btn-success">Enviar</button>
                <button type="button" class="btn btn-danger" onclick="javascript:princ()">Cancelar</button> 
               <script>
                   function princ(){
                       document.location = './index.php?mod=home';
                   }
                   </script>
                   <br><br>
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