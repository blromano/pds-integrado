<!DOCTYPE html>
<html>
<head>
    <title>solicitar</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        span{
            color: #ad1f1f;
            font-weight: bolder;
        }
        #consulta{
            float: none;
            display: list-item;
            padding: 200px;
        }
        #botao{
            margin-left: 60px;
            margin-top: -30px;
            
        }
    </style>
</head>
<body>
       
        
            <!-- Modal -->
            <div id="consulta">
                <div  class="card border-dark mb-5" style="width: 20rem;height: 10rem;">
                   <div class="card-body">
                       <div class="card-text text-justify">
                           Você tem uma consulta dia <span>25/3 (segunda-feira)</span> às <span>13:00hs</span> com o educador físico <span>Rogerinho</span> no seguinte local: <span>Postinho do Duval<span>
                           
                       </div>    
                   </div>
                 </div>
                <div id="botao">
                    <button class="btn btn-success" value="Remarcar">Remarcar</button>

                    <button class="btn btn-danger" value="Cancelar">Cancelar </button>
                </div>      
            </div>
          
</body>
</html>