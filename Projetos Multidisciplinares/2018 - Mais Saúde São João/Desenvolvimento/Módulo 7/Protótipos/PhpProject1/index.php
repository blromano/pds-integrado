<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

        <!--- basic page needs
        ================================================== -->
        <meta charset="utf-8">
        <title>Mais Saúde São João</title>
        <meta name="description" content="">  
        <meta name="author" content="">

        <!-- mobile specific metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- CSS
   ================================================== -->
        <link rel="stylesheet" href="css/base.css">  
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/vendor.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        <!-- script
        ================================================== -->
        <script src="js/modernizr.js"></script>

        <!-- favicons
             ================================================== -->
        <link rel="icon" type="image.png" href="favicon.png">
    </head>

    <body id="top">

        <!-- header 
   ================================================== -->
        <header class="sticky">

            <div class="row">


                <nav id="main-nav-wrap">
                    <ul class="main-navigation">
                        <li class="current"><a class="smoothscroll"  href="#intro" title="">Início</a></li>
                        <li><a class="smoothscroll"  href="#process" title="">Como funciona?</a></li>
                        <li><a class="smoothscroll"  href="#features" title="">Quem somos?</a></li>
                        <li><a class="smoothscroll"  href="#testimonials" title="">Nossa equipe</a></li>
                        <li><a class="smoothscroll"  href="#faq" title="">Dúvidas Frequentes</a></li>					
                        <li class="highlight with-sep"><a href="Login.php" title="">Login</a></li>					
                    </ul>
                </nav>



            </div>   	

        </header> <!-- /header -->

        <section id="process">  
            <table style="width:800px; margin-left: 20px; text-align: center">
  <tr>
    <th>Paciente</th>
    <td>Data da consulta</td>
    <th>Observação</th>
    <th></th>
  </tr>
  <tr>
    <td>Vitoria</td>
    <td>14/05/18  ||  10:30-11:30</td>
    <td>Paciente ingere pouca proteina</td>
    <td type="button"  data-toggle="modal" data-target="#myModal">
    ler mais
</td>
  </tr>
  <tr>
    <td>Ana Beatris</td>
    <td>04/05/18  ||  13:30-14:30</td>
    <td>Paciente ingere muito esteroide</td>
    <td type="button"  data-toggle="modal" data-target="#myModal">
    ler mais
  </td>
  </tr>
</table>


        </section> <!-- /process-->    


        
         <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Informaçoes completas</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body" style="text-align: center">
            <p>Nome : Vitoria Vanzela</p>
            <p>Data da consulta : 14/05/18 </p>
            <p>Hora : 10:30 - 11:30 </p>
            <p>Peso : 60 kg</p>
            <p>Foco : Ter uma vida saudável</p>
            <p>Observação : Paciente ingere pouca proteina </p>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Voltar</button>
        </div>

      </div>
    </div>
  </div>
        
        
        
        

        <div id="preloader"> 
            <div id="loader"></div>
        </div> 

        <!-- Java Script
        ================================================== --> 
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>


    </body>

</html>