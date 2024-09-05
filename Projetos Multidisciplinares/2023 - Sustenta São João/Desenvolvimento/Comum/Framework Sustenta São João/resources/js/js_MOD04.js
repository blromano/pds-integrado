function Avaliar(estrela) {
    var url = window.location;
    url = url.toString()
    url = url.split("buscarInformacoesPontoColeta.php");
    url = url[0];
   
    var s1 = document.getElementById("s1").src;
    var s2 = document.getElementById("s2").src;
    var s3 = document.getElementById("s3").src;
    var s4 = document.getElementById("s4").src;
    var s5 = document.getElementById("s5").src;
    var avaliacao = 0;
   
    switch(estrela){
        case 0:
            document.getElementById("s1").src = "../resources/img/star.png";
            document.getElementById("s2").src = "../resources/img/star.png";
            document.getElementById("s3").src = "../resources/img/star.png";
            document.getElementById("s4").src = "../resources/img/star.png";
            document.getElementById("s5").src = "../resources/img/star.png";
            avaliacao = 0;
            break;
        case 1:
            document.getElementById("s1").src = "../resources/img/estrela.png";
            document.getElementById("s2").src = "../resources/img/star.png";
            document.getElementById("s3").src = "../resources/img/star.png";
            document.getElementById("s4").src = "../resources/img/star.png";
            document.getElementById("s5").src = "../resources/img/star.png";
            avaliacao = 1;
            break;
        case 2:
            document.getElementById("s1").src = "../resources/img/estrela.png";
            document.getElementById("s2").src = "../resources/img/estrela.png";
            document.getElementById("s3").src = "../resources/img/star.png";
            document.getElementById("s4").src = "../resources/img/star.png";
            document.getElementById("s5").src = "../resources/img/star.png";
            avaliacao = 2;
            break;
        case 3:
            document.getElementById("s1").src = "../resources/img/estrela.png";
            document.getElementById("s2").src = "../resources/img/estrela.png";
            document.getElementById("s3").src = "../resources/img/estrela.png";
            document.getElementById("s4").src = "../resources/img/star.png";
            document.getElementById("s5").src = "../resources/img/star.png";
            avaliacao = 3;
            break;
        case 4:
            document.getElementById("s1").src = "../resources/img/estrela.png";
            document.getElementById("s2").src = "../resources/img/estrela.png";
            document.getElementById("s3").src = "../resources/img/estrela.png";
            document.getElementById("s4").src = "../resources/img/estrela.png";
            document.getElementById("s5").src = "../resources/img/star.png";
            avaliacao = 4;
            break;
        case 5:
            document.getElementById("s1").src = "../resources/img/estrela.png";
            document.getElementById("s2").src = "../resources/img/estrela.png";
            document.getElementById("s3").src = "../resources/img/estrela.png";
            document.getElementById("s4").src = "../resources/img/estrela.png";
            document.getElementById("s5").src = "../resources/img/estrela.png";
            avaliacao = 5;
            break;  

    }
   
    
    document.getElementById('rating').innerHTML = avaliacao;
    document.getElementById('PCO_AVALIACAO').value = avaliacao;
    
   }
