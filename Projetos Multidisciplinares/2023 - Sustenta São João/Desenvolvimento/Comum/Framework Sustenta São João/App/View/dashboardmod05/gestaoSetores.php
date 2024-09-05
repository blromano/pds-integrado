<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="title"><?php echo $this->getView()->title; ?></h5>
        </div>
            <div class="cardG-body">
              <div class=containerG>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_MOD05.css">
    <title> Gestão De Perfis de Setores </title>
</head>
<body>
	<!-- Inicio área de gerenciamento | Cadastro e Edição de Perfis -->
    <!-- Barra de busca  -->
    <form class="form-mod05G" action="">
    <div class="box">
            <h2> Gerenciamento de Perfis </h2>
            <p> Editar | Adicionar responsável 
    <form class="search-container">
        <input type="text" id="search-bar" placeholder="Buscar Responsável">

    <!-- /Barra de busca  -->

     <a href="listarRespSetores.html"> <br> Listar <br> 
     <a href="editarRespSetores.html"> Editar </a>
			</p>
            <form class="form-mod05G" action="">
                <div class="input-group">
                    <label for="nome"> Nome </label>
                    <input type="text" id="nome" placeholder="Digite o seu nome" required>
                </div>

                <div class="input-group">
                    <label for="text"> Código</label>
                    <input type="text" id="text" placeholder="Código" required>
                </div>

                <div class="input-group">
                    <label for="text">Responsável pelo Setor</label>
                    <input type="tel" id="telefone" placeholder="Digite o nome" required>
                </div>

                <div class="input-group w50">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" placeholder="Digite sua senha" required>
                </div>

                <div class="input-group w50">
                    <label for="Confirmarsenha">Confirmar Senha</label>
                    <input type="password" id="Confirmarsenha" placeholder="Confirme a senha" required>
                </div>

                <div class="input-group">
                    <button>Cadastrar</button>
                </div>
                </form>
                </div>
                </div>
              </div>
            </div>
</body>
</html>
