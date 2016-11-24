<?php

  $pagina    = '';
  $permissao = '';
  require_once ( $_SERVER['DOCUMENT_ROOT'].'/desafio/!regras.php' );

  //
  $idcontato  = intval($_POST['idcontato']);

  $sql = "DELETE FROM contato WHERE idcontato = :idcontato";

  $sql_ins  = $banco -> conectar() -> prepare($sql);

  $sql_ins -> bindParam(":idcontato", $idcontato);

  try
  {
    $sql_ins -> execute();
    echo "Deletou";
  }
  catch (PDOException $e)
  {
    //print "Erro: ".$e->getCode()."<br>PDOException: ".$e->getMessage()."<hr>";
    print "Erro";
    exit;
  }

?>
