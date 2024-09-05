<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="title"><?php echo $this->getView()->title; ?></h5>
        </div>
            <div class="cardG-body">
              <div class=containerG>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style_MOD05.css" />
  </head> 
  <body>
    <h1> E-mail de Punição </h1>
    <form
      action="https://formsubmit.co/your@email.com"
      method="POST"
      class="form-mod05G">
      <label for="label">Nome do Usuário</label>
      <input type="text" name="name" id="name" required />
      <label for="label">E-mail</label>
      <input type="email" name="email" id="email" required />
      <label for="label"> Descrição de Punição</label>
      <textarea name="message" id="message" required></textarea>
      <input type="hidden" name="_captcha" value="false" />
      <label for="label"> Tempo de banimento </label>
      <input type="time" name="_captcha" value="false" />
      <input
        type="hidden"
        name="_next"
        value="https://yourdomain.co/thanks.html"
      />
      <button type="submit">Enviar</button>

    </form>
  </body>
</html>

    
 
