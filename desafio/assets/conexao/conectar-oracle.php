<?php

  session_start('login');
  $_SESSION['usuario'] = '1';// pega usuario

  require_once('funcoes/funcoes.php');

  class Banco {

    public $consulta;

    public function conectar() {

      include ('bd-dados.php');

      $tns = "(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=" . $db['host'] . ")
      (PORT=1521)))(CONNECT_DATA=(SERVICE_NAME=" . $db['service'] . ")))";

      // Conecta
      try {
        $consulta = new PDO(
          "oci:dbname=".$tns.";charset=AL32UTF8", //charset evita ficar usando utf8_encode em todo lugar
          $db['user'],
          $db['pass'],
          array(PDO::ATTR_PERSISTENT => true)
        );
        $consulta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        echo utf8_encode("<hr />Erro! <br/>PDOException: " . $e->getMessage() . "<hr />");
        exit;
      }

      // VALIDA USUARIO E DEFINE PERMISSÃO
      include ('permissao.php');

      // RETORNA SÓ PARA USUÁRIOS COM PERMISSÃO
      if (isset($permitido) && $permitido == 'sim')
      {
        return $consulta;
      }
      else
      {
        // grava Log

        // Desconecta do Banco

        header('Location: negado.php');
        exit;

      }
    }
  }

  $banco = new Banco();

?>
