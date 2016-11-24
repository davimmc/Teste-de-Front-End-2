<?php

  $pagina    = '';
  $permissao = '';
  require_once ( $_SERVER['DOCUMENT_ROOT'].'/desafio/!regras.php' );

  /*   */
  $contato = $_POST['idcontato'];

  $sql = "SELECT * FROM contato WHERE IDCONTATO = :IDCONTATO";
  $sql_user  = $banco -> conectar() -> prepare($sql);
  $sql_user -> bindParam(":IDCONTATO", $contato);
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

  $a = array();

  for ($i=0; $i < count($retono); $i++) {
    $idcontato = intval ($retono[$i]['idcontato']);
    $nome      = ($retono[$i]['nome']);
    $email     = strtolower ($retono[$i]['email']);
    $telefone  = ($retono[$i]['telefone']);

    $a['contato'] = array(
      'idcontato' => $idcontato,
      'nome' => $nome,
      'email' => $email,
      'telefone' => $telefone,
    );
  }

  // echo "<pre>";
  // print_r($a);
  echo json_encode($a);
?>
