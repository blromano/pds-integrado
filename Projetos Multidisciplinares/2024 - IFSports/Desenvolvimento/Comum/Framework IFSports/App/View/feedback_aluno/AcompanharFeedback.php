<!DOCTYPE html> 
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Recebido</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #3ABFC3;
        }
        .summary-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .question-summary {
            background-color: #fff;
            padding: 15px;
            margin: 10px 0;
            width: 80%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .summary-text {
            font-weight: bold;
            font-size: 18px;
        }
        .icon {
            display: flex;
            align-items: center;
        }
        .icon i {
            font-size: 40px;
            color: #f39c12;
        }
        .score {
            font-weight: bold;
            font-size: 24px;
            margin-left: 10px;
            color: #000;
        }
        .general-summary {
            font-weight: bold;
            font-size: 28px;
            color: #2ecc71;
            text-align: center;
            padding: 20px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>

    <h1>Feedback Recebido</h1>

    <div id="summaryContainer" class="summary-container"></div>

    <script>
        // Simulação dos feedbacks recebidos
        let feedbacks = [
            [4, 5, 3, 4, 4, 5, 3, 4],
            [5, 4, 4, 3, 5, 4, 4, 5],
            [3, 4, 5, 4, 4, 3, 4, 5]
        ];

        const questions = [
            "Organização do Evento",
            "Arbitragem",
            "Segurança",
            "Higiene",
            "Locomoção",
            "Alimentação",
            "Qualidade dos Complexos Esportivos",
            "Comodidade"
        ];

        function calculateAverage(values) {
            const sum = values.reduce((a, b) => a + b, 0);
            return (sum / values.length).toFixed(2);
        }

        function displayFeedbacks() {
            const summaryContainer = document.getElementById('summaryContainer');
            summaryContainer.innerHTML = '';

            if (feedbacks.length === 0) {
                summaryContainer.innerHTML = '<p><strong>Nenhum feedback recebido.</strong></p>';
                return;
            }

            const totalQuestions = questions.length;
            let overallScores = Array(totalQuestions).fill(0);

            questions.forEach((_, i) => {
                const scores = feedbacks.map(feedback => feedback[i]);
                const avgScore = calculateAverage(scores);

                const questionDiv = document.createElement('div');
                questionDiv.className = 'question-summary';
                questionDiv.innerHTML = `
                    <span class="summary-text">${questions[i]}</span>
                    <div class="icon">
                        <i class="fas fa-star"></i>
                        <span class="score">${avgScore}</span>
                    </div>
                `;

                summaryContainer.appendChild(questionDiv);
                overallScores[i] = parseFloat(avgScore);
            });

            const overallAverage = calculateAverage(overallScores);

            const generalDiv = document.createElement('div');
            generalDiv.className = 'general-summary';
            generalDiv.innerHTML = `<i class="fas fa-trophy"></i> Feedback Geral: Média ${overallAverage}`;

            summaryContainer.appendChild(generalDiv);
        }

        displayFeedbacks();
    </script>

</body>
</html>
