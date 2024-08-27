
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <?php 
    include_once "MVC/controle/Conexao.php";
    $con = new Conexao(); 
    include_once "MVC/controle/AvaliacoesDAO.php";
    include_once "MVC/controle/EstabelecimentosDAO.php";
    include_once "MVC/modelo/Estabelecimentos.php";
    include_once "MVC/modelo/Avaliacoes.php";
    include_once "MVC/modelo/Reclamacoes.php";
    include_once "MVC/controle/ReclamacoesDAO.php";

    $est = new Estabelecimentos();
    $estDAO = new EstabelecimentosDAO();
    $ava = new Avaliacoes();
    $avaDAO = new AvaliacoesDAO();
    $rec = new Reclamacoes();
    $recDAO = new ReclamacoesDAO();

    $varRec = $recDAO->listarTodos();
    $varEst = $estDAO->listarTodos();
    $varAva = $avaDAO->listarTodos();

    // select * from estabelecimentos where est_id=;
    // echo $recDAO->pesquisarEstabelecimentoSolucao();
    // select * from estabelecimentos where est_id=70;
    $arr = array();
    foreach ($varEst as $linha) {
        # code...
        array_push($arr, $recDAO->pesquisarEstabelecimentoSolucao($linha['EST_ID']));
    }
    rsort($arr);
    ?>
    <table class="table relatorioTabular table-striped table-hover responsive" style="width: 100%">
      <thead> 
        <tr>
          <th> ID </th>
          <th> Estabelecimentos </th>
          <th> Problemas não solucionados </th>        
      </tr>
  </thead>
  <tbody>
    <?php foreach($varEst as $key => $linha) { ?>
    <tr>
      <td><?php echo $linha['EST_ID'];?></td>
      <?php echo $linha['EST_NOME_FANTASIA']; ?> 
      <td><?php echo $linha['AVA_DATA_HORA'];?></td>                    
      <td><?php echo $linha['AVA_NOTA'];?></td>

  </tr>

  <?php } ?>
</tbody>
</table>


</tbody>
</table>
</body>
</html>


