<?php
  $pagina    = 'desafio-2';
  $permissao = '';
  require_once ( $_SERVER['DOCUMENT_ROOT'].'/desafio/!regras.php' );
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="pt-br"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="pt-br"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="pt-br"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="pt-br"> <!--<![endif]-->
  <head>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="assets/imagens/logo.jpg"/>
    <title>Segundo Desafio</title>

    <meta name="author" content="Davi Melk Mazo de Carvalho">
    <meta name="description" content="Espero agradar o avaliador na estética e
    na simplicidade das sintaxe.">

    <!-- Métas para compatibilidade com outros navegadores -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1,chrome=IE6,chrome=IE7,chrome=IE8,chrome=IE9">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="assets/css/estilo.css">

  </head>
  <body>
    <div id="tudo" role="main">
      <!-- menu topo -->
      <nav class="menu-topo" role="navigation">
        <div class="margem-geral">
          <!-- Logotipo -->
          <div class="logo" role="img">
            <img src="assets/imagens/logo.svg" height="70px" alt="Logotipo" />
          </div>

          <!-- menu-topo -->
          <ul class="mt-navegacao" role="menu">
            <li><a role="link" href="#" role="menuitem">Lorem ipsum</a></li>
            <li><i class="mt-divisor"></i></li>
            <li><a role="link" href="#" role="menuitem">Dolor</a></li>
            <li><i class="mt-divisor"></i></li>
            <li><a role="link" href="#" role="menuitem">Consectetur</a></li>
          </ul>

          <!-- Botão para troca de tela -->
          <a href="desafio-1.php" class="interdum alinhar-direita" name="interdum"
          role="button" title="Ir ao primeiro desafio - Layout"> Interdum > </a>
        </div>
      </nav>

      <!-- breadcrumb -->
      <div class="margem-geral ">
        <div class="breadcrumb" title="breadcrumb">
          Vestibulum > Ultrices > Érat egestas > Varius felis sed
        </div>
      </div>

      <!-- Formulário -->
      <div class="margem-geral">
        <br><br>
        <div class="linha">
          <div class="coluna-5">
            <div class="margem">
              <h2>Formulario de Cadastro / Edição <hr></h2>

              <form id="meuFormulario" method="post">

                <input type="hidden" id="valida" value="">

                <label for="nome"><strong>Nome:</strong></label><br>
                <input type="text" class="formulario-campo" onkeyup="somenteLetra()"
                id="nome" placeholder="Digite seu nome"
                title="Formulário - Digite seu nome."/> <br />

                <label for="tel"><strong>Telefone:</strong></label>
                <input type="tel" class="formulario-campo" onkeyup="somenteNumeros()"
                id="tel" placeholder="Digite sua Telefone"
                title="Formulário - Digite sua Telefone." /><br />

                <label for="email"><strong>E-mail:</strong></label>
                <input type="email" class="formulario-campo"
                id="email" placeholder="Digite seu e-mail"
                title="Formulário - Digite seu e-mail."/> <br />

                <div id="acao">
                  <a href="#" class="btn-enviar alinhar-direita" onclick="gravar();">Salvar</a>
                </div>

                <a href="#" class="btn-limpar alinhar-direita" onclick="limpar();">Cancelar</a>
                <br><br><br>
              </form>
            </div>
          </div>

          <div class="coluna-7">
            <div class="margem">
              <h2>Lista de Contatos<hr></h2>
              <label for="nome"><strong>Filtar contatos:</strong></label><br>
              <input type="text" class="formulario-campo" id="filtro" placeholder="Digite um nome..."
              title="Filtro para limpar a tabela de cadastros." onkeyup="filtarContato()"><br>
              <table width="100%" border="0" class="tabela">
                <thead>
                  <td width="80%"><strong>Nome</strong></td>
                  <td colspan="3" class="center"><strong>Ação</strong></td>
                </thead>
                <tbody id="listar-cadastrados"></tbody>
              </table>

            </div><!-- / .margem -->
          </div><!-- / .coluna-6 -->
        </div><!-- / .linha -->
      </div><!-- / .margem-geral -->
    </div><!-- / #tudo  -->


    <!-- Rodapé -->
    <footer>
      <div class="margem-geral">
        <div class="menu-1 coluna-6">
          <div class="coluna-12 rp-titulo-1">
            Áuctor commod
          </div>
          <div class="coluna-8">

            <div class="coluna-12 rp-titulo-2">
              Consecteur
            </div>
            <div class="coluna-6 rp-navegacao">
              <ul role="menubar">
                <li><a role="link" href="#"> ÁLorem Item 1</a></li>
                <li><a role="link" href="#"> Item 2</a></li>
                <li><a role="link" href="#"> Lorem 3</a></li>
                <li><a role="link" href="#"> Domus item 4</a></li>
                <li><a role="link" href="#"> Domuçs 6</a></li>
              </ul>
              <br><br>
            </div>

            <div class="coluna-6 rp-navegacao">
              <ul role="menubar">
                <li><a role="link" href="#"> Lorem item 7</a></li>
                <li><a role="link" href="#"> item 8</a></li>
                <li><a role="link" href="#"> Lorem 9</a></li>
              </ul>
            </div>

            <div class="coluna-12">
              <a role="link" href="#" class="mais"><b><u>All things</u> > </b></a>
            </div>
          </div>
          <div class="coluna-4">
            <div class="coluna-12 rp-titulo-2">
              Vestibulum
            </div>

            <div class="coluna-12 rp-navegacao">
              <ul role="menubar">
                <li><a role="link" href="#"> ÁLorem Item 1</a></li>
                <li><a role="link" href="#"> Item 2</a></li>
                <li><a role="link" href="#"> Lorem 3</a></li>
                <li><a role="link" href="#"> Domus item 4</a></li>
              </ul>
              <div class="espaco"></div>
            </div>

            <div class="coluna-12">
              <a role="link" href="#" class="mais"><b><u>All things</u> > </b></a>
            </div>
          </div>
        </div>
        <div class="coluna-2">&nbsp;</div>
        <div class="menu-2 coluna-4">
          <div class="coluna-12 rp-titulo-1">
            Pellentesque
            <br><br>
          </div>
          <table border="0" width="100%">
            <tr>
              <td width="50%">
                <center>
                  <img src="assets/imagens/logos/logo-01.png" alt="logotipo demonstração"><br><br>
                </center>
              </td>
              <td width="50%">
                <center>
                  <img src="assets/imagens/logos/logo-02.png" alt="logotipo demonstração"><br><br>
                </center>
              </td>
            </tr>
            <tr>
              <td>
                <center>
                  <img src="assets/imagens/logos/logo-03.png" alt="logotipo demonstração"><br><br>
                </center>
              </td>
              <td>
                <center>
                  <img src="assets/imagens/logos/logo-04.png" alt="logotipo demonstração"><br><br>
                </center>
              </td>
            </tr>
            <tr>
              <td>
                <center>
                  <img src="assets/imagens/logos/logo-05.png" alt="logotipo demonstração"><br><br>
                </center>
              </td>
              <td>
                <center>
                  <img src="assets/imagens/logos/logo-06.png" alt="logotipo demonstração"><br><br>
                </center>
              </td>
            </tr>
          </table>
          <br><br>
        </div>
        <hr>
        <br><br>

        <!-- Navegação -->
        <div class="linha">
          <div class="coluna-6">
            <ul class="rp-menu" role="menu">
              <li><a role="link" href="#">Lorem ipsum</a></li>
              <li><i class="mt-divisor"></i></li>
              <li><a role="link" href="#">Dolor</a></li>
            </ul>
          </div>

          <div class="coluna-6">
            <ul class="rp-menu alinhar-direita" role="menu">
              <li><a role="link" href="#">Consecteur</a></li>
              <li><i class="mt-divisor"></i></li>
              <li><a role="link" href="#">Tempus mauris a</a></li>
              <li><i class="mt-divisor"></i></li>
              <li><a role="link" href="#">Phasellus in</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <div class="copyright">
      9999@Ut urna ligula, pretium ut elit dapbus, ornare tempus leo. Suspendisse augue massa<br>
      Donec in maximus metus. Suspendisse volupat ornare congue.<br><br><br><br>
    </div>

    <script type="text/javascript" src="assets/js/jquery-1.11.2.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="assets/js/desafio-2.js" charset="utf-8"></script>
  </body>
</html>
