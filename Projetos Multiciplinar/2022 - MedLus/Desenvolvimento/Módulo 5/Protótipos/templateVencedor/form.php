
          <div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="300">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Nome completo" required>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Assunto" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Mensagem" required></textarea>
              </div>
              <div class="text-center"><button type="submit">Enviar Mensagem</button></div>
            </form>
          </div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="" method="POST" class="col-sm-12 col-md-6 col-lg-3 w-100">
        <h3>Dados</h3>
        <label for="username">Nome</label>
        <input type="text" placeholder="Email or Phone" id="username">
        
        <label for="username">Agência</label>
        <input type="text" placeholder="Email or Phone" id="username">

        <label for="username">Qtd Exames</label>
        <input type="text" placeholder="Email or Phone" id="username">

        <label for="username">Qtd Consultas</label>
        <input type="text" placeholder="Email or Phone" id="username">

        <label for="username">Contato</label>
        <input type="text" placeholder="Email or Phone" id="username">

        <button type="submit">Salvar</button>
    </form>
    </div>
  </div>
</div>