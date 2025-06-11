<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Feedback</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../../resources/css/mod05.css">
    
<body>
<br>
<br>
    <h1><b>Avalie nosso Evento!</b></h1>
    <br>
    <br>
    <form id="feedbackForm">

        <!-- Perguntas -->
        <div class="question">
            <label>Qual a nota para a Organização do Evento?</label>
            <div class="rating" data-question="1"></div>
        </div>
    
        <div class="question">
            <label>Nota para a Arbitragem?</label>
            <div class="rating" data-question="2"></div>
        </div>

        <div class="question">
            <label>Nota de Segurança?</label>
            <div class="rating" data-question="3"></div>
        </div>

        <div class="question">
            <label>Nota para Higiene?</label>
            <div class="rating" data-question="4"></div>
        </div>

        <div class="question">
            <label>Nota da Locomoção para as Partidas?</label>
            <div class="rating" data-question="5"></div>
        </div>

        <div class="question">
            <label>Nota para a Alimentação?</label>
            <div class="rating" data-question="6"></div>
        </div>

        <div class="question">
            <label>Nota para a Qualidade dos Complexos Esportivos?</label>
            <div class="rating" data-question="7"></div>
        </div>

        <div class="question">
            <label>Nota para a Comodidade?</label>
            <div class="rating" data-question="8"></div>
        </div>
<br>
<br>
        <!-- Botões -->
        <button type="button" class="submit-btn" onclick="calculateFeedback()">Enviar Feedback</button>
        <button type="button" class="cancel-btn" onclick="cancelForm()">Cancelar</button>

        <div id="result" class="result"></div>
    </form>

    <script>
        const ratings = {};

        function createRatingIcons(question) {
            const ratingDiv = document.querySelector(`.rating[data-question="${question}"]`);
            ratingDiv.innerHTML = '';

            for (let i = 1; i <= 5; i++) {
                const icon = document.createElement('i');
                icon.className = 'fas fa-trophy';
                icon.dataset.value = i;
                icon.addEventListener('click', () => setRating(question, i, ratingDiv));
                ratingDiv.appendChild(icon);
            }
        }

        function setRating(question, value, ratingDiv) {
            const currentRating = ratings[question];

            if (currentRating === value) {
                // Se o usuário clicar no mesmo ícone, desmarcar
                delete ratings[question];
                setAllIconsUnselected(ratingDiv);
            } else {
                ratings[question] = value;
                const icons = ratingDiv.getElementsByTagName('i');
                for (let i = 0; i < icons.length; i++) {
                    if (parseInt(icons[i].dataset.value) <= value) {
                        icons[i].classList.add('selected');
                    }
                    else {
                        icons[i].classList.remove('selected');
                    }
                }
            }
        }

        document.querySelectorAll('.rating').forEach((ratingDiv) => {
            const questionNumber = ratingDiv.dataset.question;
            createRatingIcons(questionNumber);
        });

        function calculateFeedback() {
            const values = Object.values(ratings);
            const sum = values.reduce((a, b) => a + b, 0);
            const average = (sum / values.length).toFixed(2);

            document.getElementById('result').innerText = `Média das notas: ${average}`;
        }

        function cancelForm() {
            const form = document.getElementById('feedbackForm');
            form.reset();
            document.getElementById('result').innerText = '';
            Object.keys(ratings).forEach(key => delete ratings[key]);
        }
        function setAllIconsUnselected(ratingDiv) {
            const icons = ratingDiv.getElementsByTagName('i');
            for (let i = 0; i < icons.length; i++) {
            icons[i].classList.remove('selected');
    }
}

    </script>

</body>
</html>
