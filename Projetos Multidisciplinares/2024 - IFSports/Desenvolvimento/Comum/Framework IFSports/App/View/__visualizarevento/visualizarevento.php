<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Eventos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
            max-width: 800px;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .title {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
            font-weight: bold;
        }
        .event-box {
            background-color: #e9ecef;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }
        .event-box:hover {
            background-color: #d1d9e6;
        }
        .event-title {
            font-size: 18px;
            margin-bottom: 15px;
            color: #333;
            font-weight: bold;
        }
        .btn-event {
            background-color: #3BBFC3;
            color: #fff;
            margin: 5px;
            width: 100%;
        }
        .btn-event:hover {
            background-color: #2a99a0;
            color: #fff;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="title">Organizador e Secretário de Eventos</div>
        <div class="text-center mb-4">
            <h5 class="text-muted">Meus Eventos</h5>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="event-box">
                    <div class="event-title">JIF 2024</div>
                    <a class="btn btn-event" onclick="showResultAlert()">Acompanhar Resultados</a>
                    <a href="/feedback" class="btn btn-event" onclick="showFeedbackAlert()">Acompanhar Feedback</a>
                    <a href="/certificado" class="btn btn-event" onclick="showCertificatesAlert()">Gerar Certificados</a>
                    <a href="/denuncia" class="btn btn-event" onclick="showComplaintsAlert()">Listar Denúncias</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="event-box">
                    <div class="event-title">JIF 2024</div>
                    <button class="btn btn-event" onclick="showModalitiesAlert()">Visualizar Modalidades</button>
                    <button href="/feedback" class="btn btn-event" onclick="showFeedbackAlert()">Acompanhar Feedback</button>
                    <a href="/certificado" class="btn btn-event" onclick="showCertificatesAlert()">Gerar Certificados</a>
                    <a href="/denuncia" class="btn btn-event" onclick="showComplaintsAlert()">Listar Denúncias</a>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="event-box">
                    <div class="event-title">JIF 2024</div>
                    <button class="btn btn-event" onclick="showModalitiesAlert()">Visualizar Modalidades</button>
                    <button href="/feedback" class="btn btn-event" onclick="showFeedbackAlert()">Acompanhar Feedback</button>
                    <a href="/certificado" class="btn btn-event" onclick="showCertificatesAlert()">Gerar Certificados</a>
                    <a href="/denuncia" class="btn btn-event" onclick="showComplaintsAlert()">Listar Denúncias</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="event-box">
                    <div class="event-title">JIF 2024</div>
                    <button class="btn btn-event" onclick="showModalitiesAlert()">Visualizar Modalidades</button>
                    <button href="/feedback" class="btn btn-event" onclick="showFeedbackAlert()">Acompanhar Feedback</button>
                    <a href="/certificado" class="btn btn-event" onclick="showCertificatesAlert()">Gerar Certificados</a>
                    <a href="/denuncia" class="btn btn-event" onclick="showComplaintsAlert()">Listar Denúncias</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showResultAlert() {
            Swal.fire({
                title: 'Acompanhar Resultados',
                text: 'Aqui você pode acompanhar os resultados do evento.',
                icon: 'info',
                confirmButtonText: 'OK'
            });
        }

        function showFeedbackAlert() {
            Swal.fire({
                title: 'Acompanhar Feedback',
                text: 'Aqui você pode acompanhar o feedback dos participantes.',
                icon: 'info',
                confirmButtonText: 'OK'
            });
        }

        function showCertificatesAlert() {
            Swal.fire({
                title: 'Gerar Certificados',
                text: 'Aqui você pode gerar certificados para os participantes.',
                icon: 'info',
                confirmButtonText: 'OK'
            });
        }

        function showComplaintsAlert() {
            Swal.fire({
                title: 'Listar Denúncias',
                text: 'Aqui você pode listar e gerenciar denúncias.',
                icon: 'info',
                confirmButtonText: 'OK'
            });
        }

        function showModalitiesAlert() {
            Swal.fire({
                title: 'Visualizar Modalidades',
                text: 'Aqui você pode visualizar todas as modalidades do evento.',
                icon: 'info',
                confirmButtonText: 'OK'
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>