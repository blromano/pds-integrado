<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f4f4f4;
        }
        .container {
            margin-top: 50px;
            max-width: 600px;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .title {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }
        .stars {
            margin-bottom: 20px;
        }
        .stars i {
            font-size: 30px;
            color: #ccc;
            cursor: pointer;
            transition: color 0.3s;
        }
        .stars i:hover,
        .stars i.active {
            color: #FFD700;
        }
        .btn-primary {
            background-color: #3BBFC3;
            border: none;
        }
        .btn-primary:hover {
            background-color: #2a99a0;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="title">Pergunta 01</div>
        <div class="stars" id="stars">
            <i class="fas fa-star" data-value="1"></i>
            <i class="fas fa-star" data-value="2"></i>
            <i class="fas fa-star" data-value="3"></i>
            <i class="fas fa-star" data-value="4"></i>
            <i class="fas fa-star" data-value="5"></i>
        </div>
        <button class="btn btn-primary w-100" onclick="submitFeedback()">Enviar Feedback</button>
    </div>

    

    <script>
        let rating = 0;

        document.querySelectorAll('.stars i').forEach(star => {
            star.addEventListener('click', function() {
                rating = this.getAttribute('data-value');
                highlightStars(rating);
            });

            star.addEventListener('mouseover', function() {
                highlightStars(this.getAttribute('data-value'));
            });

            star.addEventListener('mouseout', function() {
                highlightStars(rating);
            });
        });

        function highlightStars(rating) {
            document.querySelectorAll('.stars i').forEach(star => {
                if (star.getAttribute('data-value') <= rating) {
                    star.classList.add('active');
                } else {
                    star.classList.remove('active');
                }
            });
        }

        function submitFeedback() {
            if (rating > 0) {
                Swal.fire({
                    title: 'Obrigado pelo Feedback!',
                    text: 'Sua avaliação foi enviada com sucesso.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    // Resetar a avaliação após o envio
                    rating = 0;
                    highlightStars(rating);
                });
            } else {
                Swal.fire({
                    title: 'Erro!',
                    text: 'Por favor, selecione uma avaliação.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>