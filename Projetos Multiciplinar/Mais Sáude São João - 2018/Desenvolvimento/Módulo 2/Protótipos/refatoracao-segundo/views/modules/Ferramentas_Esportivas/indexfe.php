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