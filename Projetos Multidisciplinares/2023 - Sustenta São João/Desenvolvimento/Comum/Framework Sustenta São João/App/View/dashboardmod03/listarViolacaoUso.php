<head>
    <style>
        .custom-carousel-inner {
            height: 300px;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><?php echo $this->getView()->title; ?></h5>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center flex-column">
                                            <h5 class="card-title font-weight-bold ">Título da Denúncia 1</h5>
                                            <p class="card-text">Por: Nome do Usuário 1</p>
                                        </div>
                                        <div id="carouselExample" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <li data-target="#carouselExample" data-slide-to="0" class="active"></li>
                                                <li data-target="#carouselExample" data-slide-to="1"></li>
                                                <li data-target="#carouselExample" data-slide-to="2"></li>
                                            </ol>
                                            <div class="rounded carousel-inner custom-carousel-inner d-flex align-items-center">
                                                <div class="carousel-item active">
                                                    <img src="https://images.tcdn.com.br/img/img_prod/757977/teste_box_217_1_c0e0e4ffb489ba74ed2cd344efe086c4.jpg" class="img-fluid" alt="Imagem do Problema 1" style="max-height: 100%; max-width: 100%; object-fit: contain;">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="https://static.todamateria.com.br/upload/pa/is/paisagem-natural-og.jpg" class="w-100" alt="Imagem do Problema 2">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="https://static.vecteezy.com/ti/vetor-gratis/p1/9169455-ceu-dourado-por-do-sol-na-costa-natureza-paisagem-vetor.jpg" class="w-100" alt="Imagem do Problema 3">
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Anterior</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Próximo</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex justify-content-center flex-column">
                                        <div class="container ">
                                            <p class="card-text text-justify mb-3 mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos earum quisquam minima fugit laborum animi facilis natus. Culpa velit accusamus quaerat, ab eveniet minima ad natus consequatur nobis dolore! Aut!</p>
                                        </div>
                                        <div class="container d-flex justify-content-between ">
                                            <button class="btn btn-secondary">Voltar</button>
                                            <button class="btn btn-danger">Punir</button>
                                            <button class="btn btn-info">Editar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>