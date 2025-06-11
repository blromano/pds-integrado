<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Denúncias do Evento Esportivo</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
            max-width: 1000px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 20px;
        }
        h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }
        .filter-section {
            margin-bottom: 20px;
        }
        .table {
            margin-top: 20px;
        }
        .btn-details {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center"><i class="fas fa-flag"></i> Denúncias do Evento Esportivo</h1>
        
        <div class="filter-section">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" id="filterName" class="form-control" placeholder="Filtrar por nome de quem enviou">
                </div>
                <div class="col-md-6 text-end">
                    <button class="btn btn-primary" id="applyFilter"><i class="fas fa-filter"></i> Aplicar Filtro</button>
                </div>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data de Envio</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="complaintTable">
                <!-- Linhas de denúncias serão inseridas dinamicamente aqui -->
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        // Simulação de dados de denúncias
        const complaints = [
            { name: "João Silva", date: "2024-08-01", status: "Pendente", details: "Detalhes sobre a denúncia de João Silva..." },
            { name: "Maria Souza", date: "2024-08-02", status: "Deferida", details: "Detalhes sobre a denúncia de Maria Souza..." },
            { name: "Carlos Santos", date: "2024-08-03", status: "Indeferida", details: "Detalhes sobre a denúncia de Carlos Santos..." },
            { name: "Ana Lima", date: "2024-08-04", status: "Pendente", details: "Detalhes sobre a denúncia de Ana Lima..." }
        ];

        function loadComplaints() {
            const complaintTable = document.getElementById('complaintTable');
            complaintTable.innerHTML = '';

            const filterName = document.getElementById('filterName').value.toLowerCase();

            complaints.forEach((complaint, index) => {
                if (complaint.name.toLowerCase().includes(filterName)) {
                    const row = document.createElement('tr');

                    const nameCell = document.createElement('td');
                    nameCell.textContent = complaint.name;
                    row.appendChild(nameCell);

                    const dateCell = document.createElement('td');
                    dateCell.textContent = complaint.date;
                    row.appendChild(dateCell);

                    const statusCell = document.createElement('td');
                    statusCell.textContent = complaint.status;
                    statusCell.className = complaint.status.toLowerCase() === 'pendente' ? 'text-warning' :
                                           complaint.status.toLowerCase() === 'deferida' ? 'text-success' : 'text-danger';
                    row.appendChild(statusCell);

                    const actionsCell = document.createElement('td');
                    const detailsButton = document.createElement('button');
                    detailsButton.className = 'btn btn-info btn-details';
                    detailsButton.innerHTML = '<i class="fas fa-info-circle"></i> Ver Detalhes';
                    detailsButton.onclick = () => viewDetails(complaint, index);
                    actionsCell.appendChild(detailsButton);
                    row.appendChild(actionsCell);

                    complaintTable.appendChild(row);
                }
            });
        }

        function viewDetails(complaint, index) {
            Swal.fire({
                title: `Detalhes da Denúncia`,
                html: `<strong>Nome:</strong> ${complaint.name}<br>
                       <strong>Data de Envio:</strong> ${complaint.date}<br>
                       <strong>Status:</strong>
                       <select id="statusSelect" class="form-select">
                           <option value="Pendente" ${complaint.status === 'Pendente' ? 'selected' : ''}>Pendente</option>
                           <option value="Deferida" ${complaint.status === 'Deferida' ? 'selected' : ''}>Deferida</option>
                           <option value="Indeferida" ${complaint.status === 'Indeferida' ? 'selected' : ''}>Indeferida</option>
                       </select><br><br>
                       <strong>Detalhes:</strong><br>${complaint.details}`,
                icon: 'info',
                confirmButtonText: 'Atualizar Status',
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    const updatedStatus = document.getElementById('statusSelect').value;
                    complaints[index].status = updatedStatus;
                    Swal.fire({
                        title: 'Status Atualizado!',
                        text: 'O status da denúncia foi atualizado com sucesso.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                    loadComplaints();  // Atualiza a tabela com o novo status
                }
            });
        }

        document.getElementById('applyFilter').addEventListener('click', loadComplaints);

        // Carrega a lista inicial de denúncias
        loadComplaints();
    </script>
</body>
</html>
