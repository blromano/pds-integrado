<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento</title>
    <link rel="stylesheet" href="resources/css/visualizarresultados.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="resources/images/logo.png" alt="Logo" class="logo">
        </div>
        <div class="carousel-container">
            <div class="carousel">
                <!-- Itens do Carrossel -->
                <div class="carousel-item">
                    <label for="item-1" onclick="mostrarResultados('Natação')">
                        <img src="resources/images/modalidades/natacao.jpg" alt="Natação">
                        <span class="carousel-title">Natação</span>
                    </label>
                </div>
                <div class="carousel-item">
                    <label for="item-2" onclick="mostrarResultados('Atletismo')">
                        <img src="resources/images/modalidades/atletismo.jpg" alt="Atletismo">
                        <span class="carousel-title">Atletismo</span>
                    </label>
                </div>
                <div class="carousel-item">
                    <label for="item-3" onclick="mostrarResultados('Tênis de mesa')">
                        <img src="resources/images/modalidades/tenisdemesa.jpg" alt="Tênis de mesa">
                        <span class="carousel-title">Tênis de mesa</span>
                    </label>
                </div>
                <div class="carousel-item">
                    <label for="item-4" onclick="mostrarResultados('Vôlei')">
                        <img src="resources/images/modalidades/volei.jpg" alt="Vôlei">
                        <span class="carousel-title">Vôlei</span>
                    </label>
                </div>
                <div class="carousel-item">
                    <label for="item-5" onclick="mostrarResultados('Futsal')">
                        <img src="resources/images/modalidades/futsal.jpg" alt="Futsal">
                        <span class="carousel-title">Futsal</span>
                    </label>
                </div>
                <div class="carousel-item">
                    <label for="item-6" onclick="mostrarResultados('Handebol')">
                        <img src="resources/images/modalidades/handbol.jpg" alt="Handebol">
                        <span class="carousel-title">Handebol</span>
                    </label>
                </div>
                <div class="carousel-item">
                    <label for="item-7" onclick="mostrarResultados('Basquete')">
                        <img src="resources/images/modalidades/basquete.jpg" alt="Basquete">
                        <span class="carousel-title">Basquete</span>
                    </label>
                </div>
                <div class="carousel-item">
                    <label for="item-8" onclick="mostrarResultados('Xadrez')">
                        <img src="resources/images/modalidades/xadrez.jpg" alt="Xadrez">
                        <span class="carousel-title">Xadrez</span>
                    </label>
                </div>
                <div class="carousel-item">
                    <label for="item-9" onclick="mostrarResultados('Futebol')">
                        <img src="resources/images/modalidades/futebol.jpg" alt="Futebol">
                        <span class="carousel-title">Futebol</span>
                    </label>
                </div>
                <!-- Continue com outros itens do carrossel -->
            </div>
            <button class="carousel-btn left" onclick="previousSlide()">&#8249;</button>
            <button class="carousel-btn right" onclick="nextSlide()">&#8250;</button>
            <div class="carousel-indicators">
                <label for="item-1"></label>
                <label for="item-2"></label>
                <label for="item-3"></label>
                <label for="item-4"></label>
                <label for="item-5"></label>
                <label for="item-6"></label>
                <label for="item-7"></label>
                <label for="item-8"></label>
                <label for="item-9"></label>
                <!-- Continue com outros indicadores -->
            </div>
        </div>

        <!-- Inputs de rádio escondidos -->
        <div class="carousel-inputs">
            <input type="radio" name="carousel" id="item-1" checked>
            <input type="radio" name="carousel" id="item-2">
            <input type="radio" name="carousel" id="item-3">
            <input type="radio" name="carousel" id="item-4">
            <input type="radio" name="carousel" id="item-5">
            <input type="radio" name="carousel" id="item-6">
            <input type="radio" name="carousel" id="item-7">
            <input type="radio" name="carousel" id="item-8">
            <input type="radio" name="carousel" id="item-9">
            <input type="radio" name="carousel" id="item-10">
        </div>

        <!-- Título e subtítulo -->
        <div class="event-info">
            <h2 id="event-title">Nome do Evento</h2>
            <p id="modalidade">Modalidade</p>
        </div>

        <div class="event-list">
            <ol id="resultados">
                <li class="first">1º Lugar</li>
                <li class="second">2º Lugar</li>
                <li class="third">3º Lugar</li>
            </ol>
        </div>
    </div>

    <script>
        let currentIndex = 1;
        const totalItems = 9; // Atualize este número conforme o número total de itens no seu carrossel

        function showSlide(index) {
            if (index < 1) {
                index = totalItems;
            } else if (index > totalItems) {
                index = 1;
            }

            currentIndex = index;
            document.getElementById(`item-${currentIndex}`).checked = true;

            // Atualize a transformação do carrossel
            const carousel = document.querySelector('.carousel');
            const offset = -(currentIndex - 1) * (carousel.offsetWidth / totalItems);
            carousel.style.transform = `translateX(${offset}px)`;
        }

        function nextSlide() {
            showSlide(currentIndex + 1);
        }

        function previousSlide() {
            showSlide(currentIndex - 1);
        }

        function mostrarResultados(modalidade) {
            document.getElementById('modalidade').textContent = modalidade;
            // Aqui você pode atualizar os resultados conforme a modalidade selecionada
        }

        // Inicie o carrossel com o primeiro slide visível
        showSlide(currentIndex);
    </script>
</body>
</html>



