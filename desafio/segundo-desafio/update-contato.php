<?php
  $pagina    = '';
  $permissao = '';
  require_once ( $_SERVER['DOCUMENT_ROOT'].'/desafio/!regras.php' );

  //
  $idcontato  = intval($_POST['idcontato']);
  $nome       = $_POST['nome'];
  $email      = $_POST['email'];
  $telefone   = $_POST['tel'];

  $sql = "UPDATE contato SET
    nome     = :NOME,
    telefone = :TELEFONE,
    email    = :EMAIL
    WHERE idcontato = :idcontato
  ";

  $sql_update  = $banco -> conectar() -> prepare($sql);

  $sql_update -> bindParam(":idcontato", $idcontato);
  $sql_update -> bindParam(":NOME", $nome);
  $sql_update -> bindParam(":TELEFONE", $telefone);
  $sql_update -> bindParam(":EMAIL", $email);

  try
  {
    $sql_update -> execute();
    $retono    = $sql_update -> fetchAll(PDO::FETCH_ASSOC);
  }
  catch (PDOException $e)
  {
    print "Erro: ".$e->getCode()."<br>PDOException: ".$e->getMessage()."<hr>";
    exit;
  }

?>
