<link rel="stylesheet" href="../../resources/css/mod05.css">

<div class="h1">
    <br>
    <h1>CERTIFICADOS</h1>
</div>

<!-- Categoria: Responsável de Equipe -->
<div class="category">
    <h2 onclick="toggleList('teamLeaderList')">Responsável de Equipe</h2>
    <div class="list" id="teamLeaderList">
        <ul>
            <li><span>Nome do Responsável</span><a href='/certificado/responsavel'><button>Visualizar Certificado</button></a>
            <li><span>Nome do Responsável</span><a href='/certificado/responsavel'><button>Visualizar Certificado</button></a>
            <li><span>Nome do Responsável</span><a href='/certificado/responsavel'><button>Visualizar Certificado</button></a>
        </ul>
    </div>
</div>

<!-- Categoria: Modalidade -->
<div class="category">
    <h2 onclick="toggleList('modalityList')">Modalidade</h2>
    <div class="list" id="modalityList">
        <ul>
            <!-- Caixa de seleção para modalidades -->
            <li>
                <label for="modalidadeSelect">Escolha uma Modalidade:</label>
                <select id="modalidadeSelect" onchange="showCampus(this.value)">
                    <option value="">Selecione...</option>
                    <option value="volleyball">VÔLEI</option>
                    <option value="soccer">FUTEBOL</option>
                    <option value="tableTennis">TÊNIS DE MESA</option>
                </select>
            </li>

            <!-- Lista de campus (cidades) a ser exibida conforme a modalidade -->
            <li id="campusList" style="display:none;">
                <label for="campusSelect">Campus Participantes:</label>
                <select id="campusSelect" onchange="showStudents(this.value)">
                    <option value="">Selecione um campus...</option>
                    <!-- As opções de campus serão inseridas aqui via JavaScript -->
                </select>
            </li>
            
            <!-- Lista de alunos, visível quando uma cidade é selecionada -->
            <li id="studentsList" style="display:none;">
                <h3>Alunos Participantes:</h3>
                <ul id="students">
                    <!-- Lista de alunos será gerada aqui via JavaScript -->
                </ul>
            </li>
        </ul>
    </div>
</div>

<script>
    // Função para alternar a visibilidade de listas
    function toggleList(listId) {
        const list = document.getElementById(listId);
        list.style.display = list.style.display === 'block' ? 'none' : 'block';
    }

    // Função para exibir os campus (cidades) com base na modalidade selecionada
    function showCampus(modality) {
        const campusList = document.getElementById('campusList');
        const campusSelect = document.getElementById('campusSelect');
        const studentsList = document.getElementById('studentsList');
        const students = document.getElementById('students');

        // Limpar o campo de cidades antes de adicionar novas opções
        campusSelect.innerHTML = '<option value="">Selecione uma cidade...</option>';

        // Limpar a lista de alunos
        students.innerHTML = '';
        studentsList.style.display = 'none';

        if (modality === "") {
            campusList.style.display = 'none';
            return;
        }

        // Mostrar a lista de campus (cidades)
        campusList.style.display = 'block';

        // Definir as cidades com base na modalidade selecionada
        let campuses = [];
        if (modality === 'volleyball') {
            campuses = ['São Paulo', 'Rio de Janeiro', 'Belo Horizonte'];
        } else if (modality === 'soccer') {
            campuses = ['Porto Alegre', 'Curitiba', 'Salvador'];
        } else if (modality === 'tableTennis') {
            campuses = ['Brasília', 'Recife', 'Fortaleza'];
        }

        // Adicionar as opções de campus no select
        campuses.forEach(campus => {
            const option = document.createElement('option');
            option.value = campus;
            option.textContent = campus;
            campusSelect.appendChild(option);
        });
    }

    // Função para exibir os alunos de acordo com a cidade selecionada
    function showStudents(city) {
        const studentsList = document.getElementById('studentsList');
        const students = document.getElementById('students');

        // Limpar a lista de alunos antes de adicionar novos
        students.innerHTML = '';

        if (city === "") {
            studentsList.style.display = 'none';
            return;
        }

        // Mostrar a lista de alunos
        studentsList.style.display = 'block';

        // Definir os alunos com base na cidade selecionada
        let studentsData = [];
        if (city === 'São Paulo') {
            studentsData = ['João Silva', 'Maria Oliveira', 'Carlos Pereira'];
        } else if (city === 'Rio de Janeiro') {
            studentsData = ['Ana Souza', 'Pedro Santos', 'Lucas Lima'];
        } else if (city === 'Belo Horizonte') {
            studentsData = ['Fernanda Costa', 'Rafael Almeida', 'Paula Lima'];
        } else if (city === 'Porto Alegre') {
            studentsData = ['Rodrigo Silva', 'Juliana Carvalho', 'Diego Gomes'];
        } else if (city === 'Curitiba') {
            studentsData = ['Camila Pereira', 'Gustavo Mendes', 'Letícia Martins'];
        } else if (city === 'Salvador') {
            studentsData = ['Felipe Souza', 'Mariana Almeida', 'Vitor Costa'];
        } else if (city === 'Brasília') {
            studentsData = ['Thiago Oliveira', 'Renata Costa', 'Gustavo Rocha'];
        } else if (city === 'Recife') {
            studentsData = ['Luana Pereira', 'Ricardo Lima', 'Rafaela Fernandes'];
        } else if (city === 'Fortaleza') {
            studentsData = ['Emanuel Souza', 'Laura Alves', 'Guilherme Silva'];
        }

        // Adicionar alunos à lista
        studentsData.forEach(student => {
            const li = document.createElement('li');
            li.innerHTML = `${student} <button onclick="viewCertificate('${student}')">Visualizar Certificado</button>`;
            students.appendChild(li);
        });
    }

    // Função para visualizar o certificado de um aluno
    function viewCertificate(student) {
        window.location = "/certificado/aluno"
    }
</script>
