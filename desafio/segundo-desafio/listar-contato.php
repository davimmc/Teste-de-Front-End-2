<?php

  $pagina    = '';
  $permissao = '';
  require_once ( $_SERVER['DOCUMENT_ROOT'].'/desafio/!regras.php' );

  $condicao = '';
  if (isset($_POST['filtro']) && !empty($_POST['filtro'])) {
    $contato  = $_POST['filtro'];
    $condicao = " WHERE nome like '%$contato%'";
  }

  $sql = "SELECT * FROM contato".$condicao;
  $sql_user  = $banco -> conectar() -> prepare($sql);

  try
  {
    $sql_user -> execute();
    $retono    = $sql_user -> fetchAll(PDO::FETCH_ASSOC);
  }
  catch (PDOException $e)
  {
    print "Erro: ".$e->getCode()."<br>PDOException: ".$e->getMessage()."<hr>";
    exit;
  }

  $nomes = '';
  //echo "<pre>";
  //var_dump($retono);
  // LOOP PRA PRINTAR ARRAY ASSOCIATIVO
  foreach ($retono as $col) {
    echo "<tr>
      <td>
        <b>".ucwords(strtolower($col['nome']))."</b><br>
        ".$col['telefone']." - <a href='mailto:".$col['email']."'>".$col['email']."</a> 
      </td>
      <td><a href='#' class='btn-ver' onclick='visualisa(".$col['idcontato'].")' role='link' title='Visualisar'>&#9786;</a></td>
      <td><a href='#' class='btn-edt' onclick='edita(".$col['idcontato'].")' role='link' title='Edita'>&#9998;</a></td>
      <td><a href='#' class='btn-del' onclick='excluir(".$col['idcontato'].")' role='link' title='Excluir'>&#10006;</a></td>
    </tr>";
  }
?>
