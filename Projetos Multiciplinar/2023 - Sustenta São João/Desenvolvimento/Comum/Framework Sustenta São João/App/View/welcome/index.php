<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.3/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.3/dist/sweetalert2.min.css">
<!-- slider section -->
<section class=" slider_section ">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="container">
          <div class="row">
            <div class="col-md-6 ">
              <div class="detail_box">
                <h1>
                  Bem vindo ao<br>Sustenta São João
                </h1>
                <p>
                  Unidos pela sustentabilidade, transformando reclamações em soluções.
                </p>
                <div class="btn-box">
                
                  <a class="btn-1" onclick="abrirPopup()" class="btn-1">
                    Cadastrar
                  </a>
                  <a href="/login" class="btn-2">
                    Entrar
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="img-box">
                <img class="sliderLogo" src="../resources/img/slider-img.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item ">
        <div class="container">
          <div class="row">
            <div class="col-md-6 ">
              <div class="detail_box">
                <h1>
                  Bem vindo ao<br>Sustenta São João
                </h1>
                <p>
                  Conectando a comunidade, construindo pontes digitais para serviços essenciais. 
                </p>
                <div class="btn-box">
                  <a class="btn-1" onclick="abrirPopup()">
                    Cadastrar
                  </a>
                  <a href="/login" class="btn-2">
                    Entrar
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="img-box">
                <img src="../resources/img/slider-img.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel_btn-container">
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="sr-only">Anterior</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="sr-only">Próximo</span>
      </a>
    </div>
  </div>
  <!-- popup section -->
  <div class="backdropExample">
  <div id="popup" class="popUp_a">
    <div class="header_pop_a">
      <p class="p_a">Selecione:</p>
    </div>
    <div class="body_pop_a">
      <div class="row button">
        <a class="bt-1" id="confirmarEnvio" href="/dashboard/cadastro" style="margin: 0 10px;">
          <button type="button" class="btn btn-success">
            <i class="bi bi-person-plus"></i> Cidadão
          </button>
          </a>
          <a class="bt-2" id="confirmarEnvio" href="/dashboard/cadastrogestores" style="margin: 0 10px;">
            <button type="submit" class="btn btn-success">
              <i class="bi bi-person-plus-fill"></i> Gestor
            </button>
          </a>
          <br>
          <br>
          <a class="bt-3" id="confirmarRetorno" href="/" >
            <button type="submit" class="btn btn-success">
              <i class="bi bi-arrow-left-circle"></i> Voltar
            </button>
          </a>
      </div>
    </div>
  </div>
  </div>
  <!-- end popup section -->
</section>
<!-- end slider section -->
</div>
<!-- about section -->
<section class="about_section ">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="img-box">
          <img src="../resources/img/about-img.png" alt="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="detail-box">
          <div class="heading_container">
            <h2>
              <scroll-page id="sobre_nos">Sobre Nós</scroll-page>
            </h2>
          </div>
          <p>
          <p>
            A equipe do projeto "Sustenta São João" é composta por alunos concluintes do curso Técnico em Informática Integrado ao Ensino Médio do Instituto Federal de Educação, Ciência e Tecnologia de São João da Boa Vista (IFSP-SBV).
            Em 2023, essa equipe recebeu o desafio de desenvolver este projeto como parte de seu Trabalho Final de Curso, com um compromisso direto com a comunidade Sanjoanense.
          </p>
          </p>
          <a href="/sobre">
            Ler Mais
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end about section -->
<!-- service section -->
<section class="service_section layout_padding">
  <div class="container-fluid">
    <div class="heading_container">
      <h2>
        <scroll-page id="servicos">Nossos Serviços</scroll-page>
      </h2>
      <p>
        O Sustenta São João oferece mais acessibilidade, segurança, confiabilidade e eficiência.
      </p>
    </div>

    <div class="service_container">
      <div class="box">
        <div class="img-box">
          <img src="../resources/img/s-1.png" alt="">
        </div>
        <div class="detail-box">
          <h5>
            Usuários
          </h5>
          <p>
            <i>Welcome</i> e Usuários
          </p>
        </div>
      </div>
      <div class="box">
        <div class="img-box">
          <img src="../resources/img/s-2.png" alt="">
        </div>
        <div class="detail-box">
          <h5>
            Reclamações
          </h5>
          <p>
            Gestão de Reclamações Gerais
          </p>
        </div>
      </div>
      <div class="box">
        <div class="img-box">
          <img src="../resources/img/s-3.png" alt="">
        </div>
        <div class="detail-box">
          <h5>
            Saneamento
          </h5>
          <p>
            Gestão de Saneamento Básico
          </p>
        </div>
      </div>
      <div class="box">
        <div class="img-box">
          <img src="../resources/img/s-4.png" alt="">
        </div>
        <div class="detail-box">
          <h5>
            Sustentabilidade
          </h5>
          <p>
            Gestão de Resíduos Sólidos e Sustentabilidade
          </p>
        </div>
      </div>
      <div class="box">
        <div class="img-box">
          <img src="../resources/img/s-5.png" alt="">
        </div>
        <div class="detail-box">
          <h5>
            Administrativo
          </h5>
          <p>
            Ferramentas de Apoio
          </p>
        </div>
      </div>
    </div>
    <div class="btn-box">
      <a href="/servicos">
        Ler Mais
      </a>
    </div>
  </div>
</section>
<!-- end service section -->

<script>
  function abrirPopup() {
    var popup = document.getElementById('popup');
    popup.style.display = 'block';

  }

  function fecharPopup() {
    var popup = document.getElementById('popup');
    popup.style.display = 'none';
  }
</script>