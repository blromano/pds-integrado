<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadados necessários -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar Aluno</title>
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="../../vendor/feather/feather.css">
    <link rel="stylesheet" href="../../vendor/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendor/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../resources/vendor/mdi/css/materialdesignicons.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Fim Plugins CSS -->
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="../../resources/css/vertical-layout-light/style.css">
    <link rel="stylesheet" href="../../resources/css/cadastraraluno.css">
    <!-- Fim CSS personalizado -->
    <link rel="shortcut icon" href="../../resources/images/favicon.png" />
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous">   
    </script>
</head>
<body>
    <div class="container-fluid py-4">
        <div class="cartao d-flex align-items-center auth px-0">
            <div class="card-body1">
                <!-- Logo no topo -->
                <div class="brand-logo">
                    <center> <img src="../resources/images/welcome/logo.png" alt="logo"> </center>
                </div>
                <form class="forms-sample" action="/cadastrar/aluno/inserir" method="POST" id="formCadastro">
                    <h1 class="text-sm cadastrar-se">Cadastro de Novo Aluno</h1><br>
                    <hr class="horizontal dark">
                    <div class="row">
                        <!-- Coluna para os campos -->
                        <div class="col-md-12 col-fields">
                            <center><p class="text-sm">Informações Pessoais</p></center>
                            <div class="row">
                                <!-- Campos do formulário -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ALU_NOME">Nome Completo <span class="required">*</span></label>
                                        <input id="ALU_NOME" name="ALU_NOME" class="form-control" type="text" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ALU_NOME_SOCIAL">Nome Social</label>
                                        <input id="ALU_NOME_SOCIAL" name="ALU_NOME_SOCIAL" class="form-control" type="text" value="" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ALU_CPF">CPF <span class="required">*</span></label>
                                        <input id="ALU_CPF" name="ALU_CPF" class="form-control" type="text" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ALU_RG">RG <span class="required">*</span></label>
                                        <input id="ALU_RG" name="ALU_RG" class="form-control" type="text" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ALU_DATA_NASCIMENTO">Data de Nascimento <span class="required">*</span></label>
                                        <input id="ALU_DATA_NASCIMENTO" name="ALU_DATA_NASCIMENTO" class="form-control" type="date" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ALU_TELEFONE">Telefone <span class="required">*</span></label>
                                        <input id="ALU_TELEFONE" name="ALU_TELEFONE" class="form-control" type="text" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ALU_SEXO">Sexo <span class="required">*</span></label>
                                        <div id="ALU_SEXO" class="form-control radio-group">
                                            <input type="radio" name="ALU_SEXO" value="M" id="masculino" required>
                                            <label for="masculino">Masculino</label>
                                            <input type="radio" name="ALU_SEXO" value="F" id="feminino">
                                            <label for="feminino">Feminino</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ALU_ETNIA">Etnia <span class="required">*</span></label>
                                        <div id="ALU_ETNIA" class="form-control radio-group">
                                            <input type="radio" name="ALU_ETNIA" value="BRANCO" id="branco" required>
                                            <label for="branco">Branco</label>
                                            <input type="radio" name="ALU_ETNIA" value="PRETO" id="preto">
                                            <label for="preto">Preto</label>
                                            <input type="radio" name="ALU_ETNIA" value="PARDO" id="pardo">
                                            <label for="pardo">Pardo</label>
                                            <input type="radio" name="ALU_ETNIA" value="INDÍGENA" id="indigena">
                                            <label for="indigena">Indígena</label>
                                            <input type="radio" name="ALU_ETNIA" value="AMARELO" id="amarelo">
                                            <label for="amarelo">Amarelo</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ALU_FOTO">Foto 3x4 <span class="required">*</span></label>
                                        <input id="ALU_FOTO" name="ALU_FOTO" class="form-control file-upload" type="file" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="horizontal dark">
                    <center><p class="text-sm">Endereço</p></center>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ALU_CEP">CEP <span class="required">*</span></label>
                                <input id="ALU_CEP" name="ALU_CEP" class="form-control" type="text" value="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ALU_ESTADO">Estado <span class="required">*</span></label>
                                <select id="ALU_ESTADO" name="ALU_ESTADO" class="form-control" required>
                                    <option value="" disabled selected>Selecione</option>
                                    <option value="1">São Paulo (SP)</option>
                                    <option value="2">Acre (AC)</option>
                                    <option value="3">Alagoas (AL)</option>
                                    <option value="4">Amazonas (AM)</option>
                                    <option value="5">Amapá (AP)</option>
                                    <option value="6">Bahia (BA)</option>
                                    <option value="7">Ceará (CE)</option>
                                    <option value="8">Distrito Federal (DF)</option>
                                    <option value="9">Espírito Santo (ES)</option>
                                    <option value="10">Goiás (GO)</option>
                                    <option value="11">Maranhão (MA)</option>
                                    <option value="12">Minas Gerais (MG)</option>
                                    <option value="13">Mato Grosso do Sul (MS)</option>
                                    <option value="14">Mato Grosso (MT)</option>
                                    <option value="15">Pará (PA)</option>
                                    <option value="16">Paraíba (PB)</option>
                                    <option value="17">Pernambuco (PE)</option>
                                    <option value="18">Piauí (PI)</option>
                                    <option value="19">Paraná (PR)</option>
                                    <option value="20">Rio de Janeiro (RJ)</option>
                                    <option value="21">Rio Grande do Norte (RN)</option>
                                    <option value="22">Rondônia (RO)</option>
                                    <option value="23">Roraima (RR)</option>
                                    <option value="24">Rio Grande do Sul (RS)</option>
                                    <option value="25">Santa Catarina (SC)</option>
                                    <option value="26">Sergipe (SE)</option>
                                    <option value="27">Tocantins (TO)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="FK_CIDADES_CID_ID">Cidade <span class="required">*</span></label>
                                <select id="FK_CIDADES_CID_ID" name="FK_CIDADES_CID_ID" class="form-control" required>
                                    <option value="" disabled selected>Selecione</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ALU_BAIRRO">Bairro <span class="required">*</span></label>
                                <input id="ALU_BAIRRO" name="ALU_BAIRRO" class="form-control" type="text" value="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ALU_RUA">Rua <span class="required">*</span></label>
                                <input id="ALU_RUA" name="ALU_RUA" class="form-control" type="text" value="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ALU_NUMERO">Número <span class="required">*</span></label>
                                <input id="ALU_NUMERO" name="ALU_NUMERO" class="form-control" type="text" value="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ALU_COMPLEMENTO">Complemento</label>
                                <input id="ALU_COMPLEMENTO" name="ALU_COMPLEMENTO" class="form-control" type="text" value="">
                            </div>
                        </div>
                    </div>
                    <hr class="horizontal dark">
                    <center><p class="text-sm">Dados Educacionais</p></center>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ALU_PRONTUARIO">Prontuário <span class="required">*</span></label>
                                <input id="ALU_PRONTUARIO" name="ALU_PRONTUARIO" class="form-control" type="text" value="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ALU_EMAIL">E-mail Institucional <span class="required">*</span></label>
                                <input id="ALU_EMAIL" name="ALU_EMAIL" class="form-control" type="email" value="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ALU_CAMPUS">Campus <span class="required">*</span></label>
                                <select id="ALU_CAMPUS" name="ALU_CAMPUS" class="form-control" required>
                                    <option value="" disabled selected>Selecione</option>
                                    <option value="1">Araraquara (ARQ)</option>
                                    <option value="2">Avaré (AVR)</option>
                                    <option value="3">Barretos (BRT)</option>
                                    <option value="4">Bauru (BRU)</option>
                                    <option value="5">Birigui (BRI)</option>
                                    <option value="6">Boituva (BTV)</option>
                                    <option value="7">Bragança Paulista (BRA)</option>
                                    <option value="8">Campinas (CMP)</option>
                                    <option value="9">Campos do Jordão (CJO)</option>
                                    <option value="10">Capivari (CPV)</option>
                                    <option value="11">Caraguatatuba (CAR)</option>
                                    <option value="12">Catanduva (CTD)</option>
                                    <option value="13">Cubatão (CBT)</option>
                                    <option value="14">Guarulhos (GRU)</option>
                                    <option value="15">Hortolândia (HTO)</option>
                                    <option value="16">Ilha Solteira (IST)</option>
                                    <option value="17">Itapetininga (ITP)</option>
                                    <option value="18">Itaquaquecetuba (ITQ)</option>
                                    <option value="19">Jacareí (JCR)</option>
                                    <option value="20">Jundiaí (JND)</option>
                                    <option value="21">Matão (MTO)</option>
                                    <option value="22">Piracicaba (PRC)</option>
                                    <option value="23">Presidente Epitácio (PEP)</option>
                                    <option value="24">Presidente Prudente (PRU)</option>
                                    <option value="25">Registro (RGT)</option>
                                    <option value="26">Salto (SLT)</option>
                                    <option value="27">São Carlos (SCL)</option>
                                    <option value="28">São João da Boa Vista (SBV)</option>
                                    <option value="29">São José do Rio Preto (SJP)</option>
                                    <option value="30">São José dos Campos (SJC)</option>
                                    <option value="31">São Paulo (SPO)</option>
                                    <option value="32">São Roque (SRQ)</option>
                                    <option value="33">Sertãozinho (SRT)</option>
                                    <option value="34">Sorocaba (SOR)</option>
                                    <option value="35">Suzano (SZN)</option>
                                    <option value="36">Tupã (TUP)</option>
                                    <option value="37">Votuporanga (VTP)</option>
                                    <option value="38">Pirituba (PTB)</option>
                                    <option value="39">São Miguel Paulista (SMP)</option>
                                    <!-- Adicione outros campi conforme necessário -->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="FK_CURSOS_CUR_ID">Curso <span class="required">*</span></label>
                            <select id="FK_CURSOS_CUR_ID" name="FK_CURSOS_CUR_ID" class="form-control" required>
                                <option value="" disabled selected>Selecione</option>
                                <option value="1">AUTOCAD 2D</option>
                                <option value="2">BACHARELADO EM ADMINISTRAÇÃO</option>
                                <option value="3">BACHARELADO EM AGRONOMIA</option>
                                <option value="4">BACHARELADO EM ARQUITETURA E URBANISMO</option>
                                <option value="5">BACHARELADO EM CIÊNCIA DA COMPUTAÇÃO</option>
                                <option value="6">BACHARELADO EM ENGENHARIA AERONÁUTICA</option>
                                <option value="7">BACHARELADO EM ENGENHARIA CIVIL</option>
                                <option value="8">BACHARELADO EM ENGENHARIA DE ALIMENTOS</option>
                                <option value="9">BACHARELADO EM ENGENHARIA DE BIOSSISTEMAS</option>
                                <option value="10">BACHARELADO EM ENGENHARIA DE COMPUTAÇÃO</option>
                                <option value="11">BACHARELADO EM ENGENHARIA DE CONTROLE E AUTOMAÇÃO</option>
                                <option value="12">BACHARELADO EM ENGENHARIA DE ENERGIAS RENOVÁVEIS</option>
                                <option value="13">BACHARELADO EM ENGENHARIA DE PRODUÇÃO</option>
                                <option value="14">BACHARELADO EM ENGENHARIA DE SOFTWARE</option>
                                <option value="15">BACHARELADO EM ENGENHARIA ELÉTRICA</option>
                                <option value="16">BACHARELADO EM ENGENHARIA ELETRÔNICA</option>
                                <option value="17">BACHARELADO EM ENGENHARIA MECÂNICA</option>
                                <option value="18">BACHARELADO EM QUÍMICA INDUSTRIAL</option>
                                <option value="19">BACHARELADO EM SISTEMAS DE INFORMAÇÃO</option>
                                <option value="20">BACHARELADO EM TURISMO</option>
                                <option value="21">CONFECÇÃO DE PLACAS DE CIRCUITO IMPRESSO UTILIZANDO O SOFTWARE EAGLE</option>
                                <option value="22">EDITORAÇÃO GRÁFICA</option>
                                <option value="23">ENSINO MÉDIO - COMUNICAÇÃO E ARTES</option>
                                <option value="24">ENSINO MÉDIO - ENERGIA E VIDA</option>
                                <option value="25">ENSINO MÉDIO - ENSINO MÉDIO</option>
                                <option value="26">ENSINO MÉDIO - INICIAÇÃO TECNOLÓGICA E EMPREENDEDORISMO</option>
                                <option value="27">ENSINO MÉDIO - PROF. JOVENS E ADULTOS</option>
                                <option value="28">ENSINO MÉDIO NA MODALIDADE DE JOVENS E ADULTOS INTEGRADO À FORMAÇÃO INICIAL E CONTINUADA EM INFORMÁTICA BÁSICA</option>
                                <option value="29">ESPECIALIZAÇÃO EM  INFORMÁTICA NA EDUCAÇÃO</option>
                                <option value="30">ESPECIALIZAÇÃO EM AEROPORTOS - PROJETO E CONSTRUÇÃO</option>
                                <option value="31">ESPECIALIZAÇÃO EM CIÊNCIA DE DADOS</option>
                                <option value="32">ESPECIALIZAÇÃO EM CONTROLE E AUTOMAÇÃO</option>
                                <option value="33">ESPECIALIZAÇÃO EM CULTURA, EDUCAÇÃO E TECNOLOGIAS</option>
                                <option value="34">ESPECIALIZAÇÃO EM DESENVOLVIMENTO DE PESSOAS</option>
                                <option value="35">ESPECIALIZAÇÃO EM DESENVOLVIMENTO DE SISTEMAS PARA DISPOSITIVOS MÓVEIS</option>
                                <option value="36">ESPECIALIZAÇÃO EM DESENVOLVIMENTO DE SISTEMAS PARA INTERNET E DISPOSITIVOS MÓVEIS</option>
                                <option value="37">ESPECIALIZAÇÃO EM DOCÊNCIA NA EDUCAÇÃO BÁSICA</option>
                                <option value="38">ESPECIALIZAÇÃO EM DOCÊNCIA NA EDUCAÇÃO SUPERIOR</option>
                                <option value="39">ESPECIALIZAÇÃO EM ENSINO INTERDISCIPLINAR DE CIÊNCIAS DA NATUREZA E MATEMÁTICA</option>
                                <option value="40">ESPECIALIZAÇÃO EM ENSINO DA MATEMÁTICA DOS ANOS INICIAIS DO ENSINO FUNDAMENTAL</option>
                                <option value="41">ESPECIALIZAÇÃO EM ENSINO DE CIÊNCIAS DA NATUREZA E MATEMÁTICA</option>
                                <option value="42">ESPECIALIZAÇÃO EM DOCÊNCIA PARA EDUCAÇÃO PROFISSIONAL E TECNOLÓGICA</option>
                                <option value="43">ESPECIALIZAÇÃO EM EDUCAÇÃO ESCOLAR SOB UMA PERSPECTIVA DIALÓGICA E EMANCIPATÓRIA</option>
                                <option value="44">ESPECIALIZAÇÃO EM GESTÃO DE TECNOLOGIA DA INFORMAÇÃO</option>
                                <option value="45">ESPECIALIZAÇÃO EM ENGENHARIA ELÉTRICA</option>
                                <option value="46">ESPECIALIZAÇÃO EM GESTÃO DE SISTEMAS DE INFORMAÇÃO</option>
                                <option value="47">ESPECIALIZAÇÃO EM EDUCAÇÃO BÁSICA</option>
                                <option value="48">ESPECIALIZAÇÃO EM ENSINO DE LÍNGUAS E LITERATURAS</option>
                                <option value="49">ESPECIALIZAÇÃO EM ENSINO DE CIÊNCIAS E EDUCAÇÃO MATEMÁTICA</option>
                                <option value="50">ESPECIALIZAÇÃO EM GESTÃO DE PROJETOS</option>
                                <option value="51">ESPECIALIZAÇÃO EM EDUCAÇÃO PROFISSIONAL INTEGRADA  A EDUCAÇÃO BÁSICA NA MODALIDADE EDUCAÇÃO DE JOVENS E ADULTOS - PROEJA</option>
                                <option value="52">ESPECIALIZAÇÃO EM EDUCAÇÃO PROFISSIONAL INTEGRADA À EDUCAÇÃO BÁSICA NA MODALIDADE EJA</option>
                                <option value="53">ESPECIALIZAÇÃO EM EDUCAÇÃO PROFISSIONAL TÉCNICA DE NÍVEL MÉDIO INTEGRADA  AO ENSINO MÉDIO NA MODALIDADE EDUCAÇÃO DE JOVENS E ADULTOS</option>
                                <option value="54">ESPECIALIZAÇÃO EM ENSINO DE FILOSOFIA</option>
                                <option value="55">ESPECIALIZAÇÃO EM GESTÃO DA TECNOLOGIA DA INFORMAÇÃO</option>
                                <option value="57">ESPECIALIZAÇÃO EM GESTÃO ESTRATÉGICA DE TECNOLOGIA DA INFORMAÇÃO</option>
                                <option value="58">ESPECIALIZAÇÃO EM INTERNET DAS COISAS</option>
                                <option value="59">ESPECIALIZAÇÃO EM PRODUÇÃO SUCROENERGÉTICA</option>
                                <option value="60">ESPECIALIZAÇÃO LATO SENSU EM EDUCAÇÃO: CIÊNCIA, TECNOLOGIA E SOCIEDADE</option>
                                <option value="61">ESPECIALIZAÇÃO EM TRABALHO ASSOCIADO E EDUCAÇÃO PARA ALÉM DO CAPITAL NA AMÉRICA LATINA</option>
                                <option value="62">ESPECIALIZAÇÃO EM TEMAS TRANSVERSAIS</option>
                                <option value="63">ESPECIALIZAÇÃO LATO SENSU EM INDÚSTRIA 4.0</option>
                                <option value="64">ESPECIALIZAÇÃO LATO SENSU EM FORMAÇÃO DE PROFESSORES - ÊNFASE NO ENSINO SUPERIOR</option>
                                <option value="65">ESPECIALIZAÇÃO LATO SENSU EM FORMAÇÃO DE PROFESSORES COM ÊNFASE NO MAGISTÉRIO SUPERIOR</option>
                                <option value="66">ESPECIALIZAÇÃO EM LOGÍSTICA E OPERAÇÕES</option>
                                <option value="67">ESPECIALIZAÇÃO EM GESTÃO EM TECNOLOGIA DA INFORMAÇÃO E COMUNICAÇÃO</option>
                                <option value="68">FIC - PROJETISTA MECÂNICO</option>
                                <option value="69">FORMAÇÃO INICIAL E CONTINUADA EM AUXILIAR EM HOSPEDAGEM INTEGRADO AO ENSINO FUNDAMENTAL II NA MODALIDADE DE JOVENS E ADULTOS</option>
                                <option value="70">FORMAÇÃO INICIAL E CONTINUADA DE AUXILIAR EM USINAGEM INDUSTRIAL – TORNEARIA INTEGRADO AO ENSINO FUNDAMENTAL II NA MODALIDADE DE EDUCAÇÃO DE JOVENS E ADULTOS</option>
                                <option value="71">FORMAÇÃO INICIAL OU CONTINUADA DE INSPETOR DE QUALIDADE, INTEGRADO AO ENSINO FUNDAMENTAL II NA MODALIDADE DE EDUCAÇÃO DE JOVENS E ADULTOS</option>
                                <option value="72">FORMAÇÃO INICIAL OU CONTINUADA DE INSTALADOR PREDIAL DE BAIXA TENSÃO INTEGRADO AO ENSINO FUNDAMENTAL II NA MODALIDADE DE EDUCAÇÃO DE JOVENS E ADULTOS</option>
                                <option value="73">FORMAÇÃO INICIAL E CONTINUADA DE QUALIFICAÇÃO PROFISSIONAL EM OPERADOR DE COMPUTADOR NA FORMA INTEGRADA AO ENSINO FUNDAMENTAL II NA MODALIDADE EJA</option>
                                <option value="74">FORMAÇÃO PEDAGÓGICA DE DOCENTES PARA A EDUCAÇÃO PROFISSIONAL DE NÍVEL MÉDIO</option>
                                <option value="75">INCLUSÃO DIGITAL</option>
                                <option value="76">INTRODUÇÃO AO HARDWARE E MONTAGEM DE COMPUTADORES</option>
                                <option value="77">LATO SENSU EM DOCÊNCIA NA EDUCAÇÃO BÁSICA</option>
                                <option value="78">LEITURA E INTERPRETAÇÃO DE DESENHO TÉCNICO</option>
                                <option value="79">LATO SENSU EM FORMAÇÃO DOCENTE: EDUCAÇÃO PARA INSERÇÃO SOCIAL</option>
                                <option value="80">LICENCIATURA EM CIÊNCIAS BIOLÓGICAS</option>
                                <option value="81">LICENCIATURA EM CIÊNCIAS NATURAIS: HABILITAÇÃO EM FÍSICA</option>
                                <option value="82">LICENCIATURA EM CIÊNCIAS NATURAIS: HABILITAÇÃO EM QUÍMICA</option>
                                <option value="83">LICENCIATURA EM FÍSICA</option>
                                <option value="84">LICENCIATURA EM GEOGRAFIA</option>
                                <option value="85">LICENCIATURA EM LETRAS</option>
                                <option value="86">LICENCIATURA EM LETRAS - HABILITAÇÃO EM LÍNGUA PORTUGUESA</option>
                                <option value="87">LICENCIATURA EM LETRAS - HABILITAÇÃO EM PORTUGUÊS E INGLÊS</option>
                                <option value="88">LICENCIATURA EM LETRAS - PORTUGUÊS</option>
                                <option value="89">LICENCIATURA EM LETRAS - PORTUGUÊS E ESPANHOL</option>
                                <option value="90">LICENCIATURA EM LETRAS - PORTUGUÊS E INGLÊS</option>
                                <option value="91">LICENCIATURA EM LETRAS PORTUGUÊS  E INGLÊS</option>
                                <option value="92">LICENCIATURA EM MATEMÁTICA</option>
                                <option value="93">LICENCIATURA EM PEDAGOGIA</option>
                                <option value="94">LICENCIATURA EM PEDAGOGIA E EDUCAÇÃO PROFISSIONAL E TECNOLÓGICA</option>
                                <option value="95">LICENCIATURA EM QUÍMICA</option>
                                <option value="96">LINGUAGEM DE PROGRAMAÇÃO ASSEMBLER</option>
                                <option value="97">MANUTENÇÃO ELÉTRICA DOMICILIAR</option>
                                <option value="98">MESTRADO ACADÊMICO DO PROGRAMA DE PÓS-GRADUAÇÃO EM ENGENHARIA MECÂNICA</option>
                                <option value="99">MESTRADO PROFISSIONAL DO PROGRAMA DE PÓS-GRADUAÇÃO EM AUTOMAÇÃO E CONTROLE DE PROCESSOS</option>
                                <option value="100">MESTRADO PROFISSIONAL DO PROGRAMA DE PÓS-GRADUAÇÃO EM ENSINO DE CIÊNCIAS E MATEMÁTICA</option>
                                <option value="101">MESTRADO PROFISSIONAL DO PROGRAMA DE PÓS-GRADUAÇÃO EM MATEMÁTICA EM REDE NACIONAL - PROFMAT</option>
                                <option value="102">MESTRADO PROFISSIONAL EM EDUCAÇÃO PROFISSIONAL E TECNOLÓGICA EM REDE NACIONAL (PROFEPT)</option>
                                <option value="103">PINTOR DE PAREDES DE ALVENARIA</option>
                                <option value="104">PÓS GRADUAÇÃO - LATO SENSU ESPECIALIZAÇÃO EM GESTÃO FINANCEIRA</option>
                                <option value="105">PÓS-GRADUAÇÃO LATO SENSU EM FORMAÇÃO DOCENTE: TECNOLOGIAS DA INFORMAÇÃO E COMUNICAÇÃO APLICADAS  AO ENSINO DE CIÊNCIAS</option>
                                <option value="106">PÓS-GRADUAÇÃO LATO SENSU EM SABERES E PRÁTICAS PARA A DOCÊNCIA NO ENSINO FUNDAMENTAL I</option>
                                <option value="107">PÓS GRADUAÇÃO LATO SENSU EM DESENVOLVIMENTO WEB</option>
                                <option value="108">PÓS GRADUAÇÃO LATO SENSU EM INFORMÁTICA APLICADA À EDUCAÇÃO</option>
                                <option value="109">PÓS-GRADUAÇÃO LATO SENSU EDUCAÇÃO EM DIREITOS HUMANOS</option>
                                <option value="110">PÓS-GRADUAÇÃO LATO SENSU EM HUMANIDADES - EDUCAÇÃO, POLÍTICA E SOCIEDADE</option>
                                <option value="111">PÓS-GRADUAÇÃO LATO SENSU EM HUMANIDADES - CIÊNCIA, CULTURA E SOCIEDADE</option>
                                <option value="112">PROGRAMA ESPECIAL DE FORMAÇÃO DE DOCENTES PARA A EDUCAÇÃO BÁSICA</option>
                                <option value="113">TÉCNICO EM EDIFICAÇÕES</option>
                                <option value="114">TÉCNICO EM AÇÚCAR E ÁLCOOL INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="115">TÉCNICO EM ADMINISTRAÇÃO</option>
                                <option value="116">TÉCNICO EM ADMINISTRAÇÃO INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="117">TÉCNICO EM ADMINISTRAÇÃO INTEGRADO AO ENSINO MÉDIO NA MODALIDADE DE EDUCAÇÃO DE JOVENS E ADULTOS</option>
                                <option value="118">TÉCNICO EM ADMINISTRAÇÃO INTEGRADO AO ENSINO MÉDIO NA MODALIDADE DE JOVENS E ADULTOS</option>
                                <option value="119">TÉCNICO EM ADMINISTRAÇÃO INTEGRADO AO ENSINO MÉDIO NA MODALIDADE EDUCAÇÃO DE JOVENS E ADULTOS</option>
                                <option value="120">TÉCNICO EM ADMINISTRAÇÃO INTEGRADO AO ENSINO MÉDIO NA MODALIDADEDE DE JOVENS E ADULTOS</option>
                                <option value="121">TÉCNICO EM AGROINDÚSTRIA</option>
                                <option value="122">TÉCNICO EM AGROINDÚSTRIA INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="123">TÉCNICO EM AGRONEGÓCIO</option>
                                <option value="124">TÉCNICO EM AGROPECUÁRIA INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="125">TÉCNICO EM ALIMENTOS</option>
                                <option value="126">TÉCNICO EM ALIMENTOS INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="127">TÉCNICO EM AUTOMAÇÃO INDUSTRIAL</option>
                                <option value="128">TÉCNICO EM AUTOMAÇÃO INDUSTRIAL INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="129">TÉCNICO EM CERVEJARIA</option>
                                <option value="130">TÉCNICO EM COMÉRCIO</option>
                                <option value="131">TÉCNICO EM COMÉRCIO INTEGRADO AO ENSINO MÉDIO NA MODALIDADE DE JOVENS E ADULTOS</option>
                                <option value="132">TÉCNICO EM CONSTRUÇÃO CIVIL COM HABILITAÇÃO EM GERENCIAMENTO DE EXECUÇÃO DE OBRAS</option>
                                <option value="133">TÉCNICO EM CONSTRUÇÃO CIVIL COM HABILITAÇÃO EM PLANEJAMENTO E PROJETOS</option>
                                <option value="134">TÉCNICO EM DESENHO DE CONSTRUÇÃO CIVIL INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="135">TÉCNICO EM DESENVOLVIMENTO COMUNITÁRIO</option>
                                <option value="136">TECNICO EM DESENVOLVIMENTO DE SISTEMAS</option>
                                <option value="137">TÉCNICO EM DESENVOLVIMENTO DE SISTEMAS COMERCIAIS</option>
                                <option value="138">TÉCNICO EM DESENVOLVIMENTO DE SISTEMAS INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="139">TÉCNICO EM DESIGN DE INTERIORES</option>
                                <option value="141">TÉCNICO EM EDIFICAÇÕES INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="142">TÉCNICO EM ELETROELETRÔNICA</option>
                                <option value="143">TÉCNICO EM ELETROELETRÔNICA INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="144">TÉCNICO EM ELETROMECÂNICA</option>
                                <option value="145">TÉCNICO EM ELETROMECÂNICA INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="146">TÉCNICO EM ELETRÔNICA</option>
                                <option value="147">TÉCNICO EM ELETRÔNICA INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="148">TÉCNICO EM ELETROTÉCNICA</option>
                                <option value="149">TÉCNICO EM ELETROTÉCNICA - AUTOMAÇÃO PREDIAL</option>
                                <option value="150">TÉCNICO EM ELETROTÉCNICA INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="151">TÉCNICO EM EVENTOS</option>
                                <option value="152">TÉCNICO EM EVENTOS INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="153">TÉCNICO EM FABRICAÇÃO MECÂNICA</option>
                                <option value="154">TÉCNICO EM GESTÃO EMPRESARIAL</option>
                                <option value="155">TÉCNICO EM HOSPEDAGEM</option>
                                <option value="156">TÉCNICO EM HOSPEDAGEM INTEGRADO AO ENSINO MÉDIO NA MODALIDADE DE JOVENS E ADULTOS</option>
                                <option value="157">TÉCNICO EM INFORMÁTICA</option>
                                <option value="158">TÉCNICO EM INFORMÁTICA COM HABILITAÇÃO EM PROGRAMAÇÃO E DESENVOLVIMENTO DE SISTEMAS</option>
                                <option value="159">TÉCNICO EM INFORMÁTICA INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="160">TÉCNICO EM INFORMÁTICA PARA A INTERNET INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="161">TÉCNICO EM INFORMÁTICA PARA INTERNET</option>
                                <option value="162">TÉCNICO EM INFORMÁTICA PARA INTERNET INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="163">TÉCNICO EM INFORMÁTICA PARA INTERNET INTEGRADO AO ENSINO MÉDIO NA MODALIDADE DE JOVENS E ADULTOS</option>
                                <option value="164">TÉCNICO EM LAZER INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="165">TÉCNICO EM LOGÍSTICA</option>
                                <option value="166">TÉCNICO EM LOGÍSTICA INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="167">TÉCNICO EM LOGÍSTICA INTEGRADO AO ENSINO MÉDIO NA MODALIDADE DE JOVENS E ADULTOS</option>
                                <option value="168">TÉCNICO EM MANUTENÇÃO AERONÁUTICA EM AVIÔNICOS INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="169">TÉCNICO EM MANUTENÇÃO AERONÁUTICA EM CÉLULA</option>
                                <option value="170">TÉCNICO EM MANUTENÇÃO AERONÁUTICA EM GRUPO MOTOPROPULSOR</option>
                                <option value="171">TÉCNICO EM MANUTENÇÃO AUTOMOTIVA INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="172">TÉCNICO EM MANUTENÇÃO DE AERONAVES EM AVIÔNICOS INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="173">TÉCNICO EM MANUTENÇÃO DE AERONAVES EM CÉLULA</option>
                                <option value="174">TÉCNICO EM MANUTENÇÃO E SUPORTE EM INFORMÁTICA</option>
                                <option value="175">TÉCNICO EM MARKETING</option>
                                <option value="176">TÉCNICO EM MECÂNICA</option>
                                <option value="177">TÉCNICO EM MECÂNICA COM ÊNFASE EM PROCESSOS DE PRODUÇÃO</option>
                                <option value="178">TÉCNICO EM MECÂNICA INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="179">TÉCNICO EM MECÂNICA INTEGRADO AO ENSINO MÉDIO NA MODALIDADE DE JOVENS E ADULTOS</option>
                                <option value="180">TÉCNICO EM MECATRÔNICA</option>
                                <option value="181">TÉCNICO EM MECATRÔNICA INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="182">TÉCNICO EM MEIO AMBIENTE</option>
                                <option value="183">TÉCNICO EM MEIO AMBIENTE INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="184">TÉCNICO EM MULTIMEIOS DIDÁTICOS</option>
                                <option value="185">TÉCNICO EM PROCESSAMENTO DE DADOS INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="186">TÉCNICO EM PRODUÇÃO DE ÁUDIO E VÍDEO INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="187">TÉCNICO EM QUALIDADE</option>
                                <option value="188">TÉCNICO EM QUALIDADE INTEGRADO AO ENSINO MÉDIO NA MODALIDADE DE JOVENS E ADULTOS</option>
                                <option value="189">TÉCNICO EM QUÍMICA</option>
                                <option value="190">TÉCNICO EM QUÍMICA INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="191">TÉCNICO EM RECURSOS HUMANOS</option>
                                <option value="192">TÉCNICO EM REDES DE COMPUTADORES INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="193">TÉCNICO EM SECRETARIA ESCOLAR</option>
                                <option value="194">TÉCNICO EM SEGURANÇA DO TRABALHO INTEGRADO AO ENSINO MÉDIO NA MODALIDADE EDUCAÇÃO DE JOVENS E ADULTOS</option>
                                <option value="195">TÉCNICO EM SERVIÇOS DE RESTAURANTE E BAR</option>
                                <option value="196">TÉCNICO EM SISTEMAS DE ENERGIA RENOVÁVEL</option>
                                <option value="197">TÉCNICO EM SISTEMAS DE ENERGIA RENOVÁVEL INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="198">TÉCNICO EM TELECOMUNICAÇÕES</option>
                                <option value="199">TÉCNICO EM TELECOMUNICAÇÕES COM HABILITAÇÃO EM OPERAÇÃO DE SISTEMAS DE COMUTAÇÃO</option>
                                <option value="200">TÉCNICO EM TELECOMUNICAÇÕES INTEGRADO AO ENSINO MÉDIO</option>
                                <option value="201">TÉCNICO EM TELECOMUNICAÇÕES INTEGRADO AO ENSINO MÉDIO NA MODALIDADE DE JOVENS E ADULTOS</option>
                                <option value="202">TÉCNICO INDUSTRIAL COM HABILITAÇÃO EM AUTOMAÇÃO</option>
                                <option value="203">TECNICO INDUSTRIAL COM HABILITAÇÃO EM ELETROTÉCNICA</option>
                                <option value="204">TÉCNICO INDUSTRIAL COM HABILITAÇÃO EM INSTALAÇÕES DE SISTEMA DE ENERGIA ELÉTRICA</option>
                                <option value="205">TÉCNICO INDUSTRIAL COM HABILITAÇÃO EM MANUTENÇÃO DE EQUIPAMENTOS ELETRÔNICOS</option>
                                <option value="206">TÉCNICO INDUSTRIAL COM HABILITAÇÃO EM MANUTENÇÃO DE SISTEMAS DE AUTOMAÇÃO</option>
                                <option value="207">TÉCNICO INDUSTRIAL COM HABILITAÇÃO EM PLANEJAMENTO E CONTROLE DA PRODUÇÃO</option>
                                <option value="208">TECNOLOGIA EM AGRONEGÓCIO</option>
                                <option value="209">TECNOLOGIA EM ANÁLISE E DESENVOLMENTO DE SISTEMAS</option>
                                <option value="210">TECNOLOGIA EM ANÁLISE E DESENVOLVIMENTO DE SISTEMAS</option>
                                <option value="211">TECNOLOGIA EM AUTOMAÇÃO INDUSTRIAL</option>
                                <option value="212">TECNOLOGIA EM DESIGN DE INTERIORES</option>
                                <option value="213">TECNOLOGIA EM ELETRÔNICA INDUSTRIAL</option>
                                <option value="214">TECNOLOGIA EM FABRICAÇÃO MECÂNICA</option>
                                <option value="215">TECNOLOGIA EM GASTRONOMIA</option>
                                <option value="216">TECNOLOGIA EM GESTÃO AMBIENTAL</option>
                                <option value="217">TECNOLOGIA EM GESTÃO DA PRODUÇÃO INDUSTRIAL</option>
                                <option value="218">TECNOLOGIA EM GESTÃO DE RECURSOS HUMANOS</option>
                                <option value="219">TECNOLOGIA EM GESTÃO DE TURISMO</option>
                                <option value="220">TECNOLOGIA EM GESTÃO DO AGRONEGÓCIO</option>
                                <option value="221">TECNOLOGIA EM GESTÃO PÚBLICA</option>
                                <option value="222">TECNOLOGIA EM LOGÍSTICA</option>
                                <option value="223">TECNOLOGIA EM MANUTENÇÃO DE AERONAVES</option>
                                <option value="224">TECNOLOGIA EM MECATRÔNICA INDUSTRIAL</option>
                                <option value="225">TECNOLOGIA EM PROCESSOS GERENCIAIS</option>
                                <option value="226">TECNOLOGIA EM PROCESSOS QUÍMICOS</option>
                                <option value="227">TECNOLOGIA EM SISTEMAS ELÉTRICOS</option>
                                <option value="228">TECNOLOGIA EM SISTEMAS PARA INTERNET</option>
                                <option value="229">TECNOLOGIA EM TURISMO E HOSPITALIDADE</option>
                                <option value="230">TECNOLOGIA EM VITICULTURA E ENOLOGIA</option>
                            </select>
                        </div>
                    </div>
                    </div>
                    <hr class="horizontal dark">
                    <center><p class="text-sm">Definição de Senha</p></center>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ALU_SENHA">Senha <span class="required">*</span></label>
                                <input id="ALU_SENHA" name="ALU_SENHA" class="form-control" type="password" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ALU_VERIFICAR_SENHA">Confirmação da Senha <span class="required">*</span></label>
                                <input id="ALU_VERIFICAR_SENHA" name="ALU_VERIFICAR_SENHA" class="form-control" type="password" required>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_SESSION['error_message'])) {
                        echo $_SESSION['error_message'];
                        unset($_SESSION['error_message']);
                    }
                    ?>
                    <div id="mensagemErro" style="color: red; text-align: center; font-size: 0.9em;"></div>
                    <div class="form-group text-center">
                        <div class="button-group">
                            <button type="submit" class="btn btn-primary1">Cadastrar</button>
                            <button type="button" class="btn btn-cancel" onclick="window.location.href='/login'">Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("formCadastro").addEventListener("submit", function(event) {
            const email = document.getElementById("ALU_EMAIL").value;
            const senha = document.getElementById("ALU_SENHA").value;
            const confirmarSenha = document.getElementById("ALU_VERIFICAR_SENHA").value;
            const mensagemErro = document.getElementById("mensagemErro");
    
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
            // Validação de senha com mínimo de 8 caracteres
            if (senha.length < 8) {
                event.preventDefault();
                mensagemErro.textContent = "A senha deve conter pelo menos 8 caracteres.";
                return;
            }
    
            // Validação de senha
            if (senha !== confirmarSenha) {
                event.preventDefault();
                mensagemErro.textContent = "As senhas não coincidem. Por favor, tente novamente.";
                return;
            }
    
            // Validação de e-mail
            if (!emailRegex.test(email)) {
                event.preventDefault();
                mensagemErro.textContent = "Por favor, insira um e-mail válido.";
                return;
            }
    
            mensagemErro.textContent = ""; // Limpa a mensagem de erro se tudo estiver ok
        });



        $("#ALU_ESTADO").on("change", function(){
        var id_estado = $(this).val();

            // Faz uma requisição AJAX para buscar as cidades
            
        // Faz uma requisição AJAX para buscar as cidades
        $.ajax({
            method: 'GET',
            url: '/cidades/listar',
            data: { estado: id_estado },
            dataType: 'json',
            success: function (response) {
                // Limpa as opções anteriores do select
                var $select = $("#FK_CIDADES_CID_ID");
                $select.empty();
                    // Adiciona uma opção padrão
                    $select.append('<option value="">Selecione uma cidade</option>');

                    // Itera sobre as cidades do JSON e adiciona como opções no select
                    response.forEach(function (cidade) {
                        $select.append('<option value="' + cidade.CID_ID + '">' + cidade.CID_NOME + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error("Erro ao buscar cidades:", error);
                }
            });
        });

    </script>
    
    <!-- Plugins JS -->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../vendor/datatables.net/js/jquery.dataTables.js"></script>
    <script src="../../vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="../../resources/js/dataTables.select.min.js"></script>
    <!-- Fim Plugins JS -->
    <!-- JS personalizado -->
    <script src="../../resources/js/vertical-layout-light/off-canvas.js"></script>
    <script src="../../resources/js/vertical-layout-light/hoverable-collapse.js"></script>
    <script src="../../resources/js/vertical-layout-light/misc.js"></script>
    <script src="../../resources/js/vertical-layout-light/settings.js"></script>
    <script src="../../resources/js/vertical-layout-light/todolist.js"></script>
    <!-- Fim JS personalizado -->
</body>
</html>
