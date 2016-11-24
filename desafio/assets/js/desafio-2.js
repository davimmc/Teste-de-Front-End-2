/* Davi Melk Mazo de Carvalho */
function exibeContatos() {
  $.post('segundo-desafio/listar-contato.php', function (data) {
    $('#listar-cadastrados').html(data);
  });
}

// Inicia a tela e ja faz o select
exibeContatos();

// Limpa o resultado da tabela de contatos
function filtarContato() {
  var contato = $('#filtro').val();
  $.post('segundo-desafio/listar-contato.php', {filtro:contato}, function (data) {
    $('#listar-cadastrados').html(data);
  });
}

// Caso precise que o site deslize para cima
function subir() {
  $('html, body').animate({scrollTop:0}, 'slow');
}

// Limpar campos do formulario
function limpar() {
  $('#valida').val('');
  $('#nome').val('');
  $('#email').val('');
  $('#tel').val('');
  $('#acao').html('<a href="#" class="btn-enviar alinhar-direita" onclick="gravar();">Salvar</a>');
}

// Gravar novo contato
function gravar() {

  validaFormulario()

  var idcontato = $('#valida').val();
  var nome      = $('#nome').val();
  var email     = $('#email').val();
  var tel       = $('#tel').val();

  if (idcontato == '' && nome != '' && email != '' && tel != '')
  {
    $.post('segundo-desafio/gravar-contato.php',
    {'nome':nome, 'email':email, 'tel':tel}, function (data) {
      if (data = 'gravou')
      {
        alert('Contato gravado com sucesso!');
        exibeContatos();
        limpar();
      }
      else {
        alert('Falha na gravação!');
      }
    });
  }
}

// Traz pra edição novo contato
function visualisa(idcontato) {

  subir();  //Caso a lista seja grande

  $.ajax({
    type:     "POST",
    url:      "segundo-desafio/abrir-contato.php",
    dataType: "json",
    data:     {idcontato:idcontato},
    success: function(data){

      limpar();

      var resultado  = data;
      var idcontato  = resultado['contato'].idcontato;
      var nome       = resultado['contato'].nome;
      var email      = resultado['contato'].email;
      var tel        = resultado['contato'].telefone;

      $('#valida').val(idcontato);
      $('#nome').val(nome);
      $('#email').val(email);
      $('#tel').val(tel);
      $('#acao').html('');
    }
  });
}

function edita(idcontato) {

  subir();  //Caso a lista seja grande

  $.ajax({
    type:     "POST",
    url:      "segundo-desafio/abrir-contato.php",
    dataType: "json",
    data:     {idcontato:idcontato},
    success: function(data){

      limpar();

      var resultado  = data;
      var idcontato  = resultado['contato'].idcontato;
      var nome       = resultado['contato'].nome;
      var email      = resultado['contato'].email;
      var tel        = resultado['contato'].telefone;

      $('#valida').val(idcontato);
      $('#nome').val(nome);
      $('#email').val(email);
      $('#tel').val(tel);
      $('#acao').html('<a href="#" class="btn-enviar alinhar-direita" onclick="update('+idcontato+');">Editar</a>');
    }
  });
}

// Altera na base o contato
function update(idcontato) {

  validaFormulario();

  var id        = $('#valida').val();
  var nome      = $('#nome').val();
  var email     = $('#email').val();
  var tel       = $('#tel').val();

  if (id != '' && nome != '' && email != '' && tel != '')
  {
    $.post('segundo-desafio/update-contato.php',
    {'idcontato':idcontato, 'nome':nome, 'email':email, 'tel':tel}, function (data) {
      if (data = 'Gravou')
      {
        alert('Contato editado com sucesso!');
        exibeContatos();
      }
      else {
        alert('Falha na edição!');
      }
    });
  }
}

// Excluir contato
function excluir(idcontato) {

  var r = confirm("Deseja realmente excluir esse contato?");

  if (r == true) {

    $.post('segundo-desafio/delete-contato.php',
    {'idcontato':idcontato }, function (data) {
      if (data = 'Deletou')
      {
        alert('Contato deletado com sucesso!');
        limpar();
        exibeContatos();
      }
      else {
        alert('Falha ao excluir!');
      }
    });

  } else {
    alert("Cancelado!");
  }
}

// Valida formulario e deixa campos em branco com a borda vermelha
function validaFormulario() {

  var nome      = $('#nome').val();
  var email     = $('#email').val();
  var tel       = $('#tel').val();

  if (nome == '') {
    $('#nome').css({'border':'1px solid red'});
  }else {
    $('#nome').removeAttr('style');
  }

  if (email == '') {
    $('#email').css({'border':'1px solid red'});
  }else {
    $('#email').removeAttr('style');
  }

  if (tel == '') {
    $('#tel').css({'border':'1px solid red'});
  }else {
    $('#tel').removeAttr('style');
  }
}

$(document).ready(function() {
  $('#nome').keypress(function(e){
  	if (
      (e.charCode  > 64 && e.charCode  < 91) ||
      (e.charCode  > 96 && e.charCode  < 123) ||
      (e.charCode  == 0)  ||
      (e.charCode  == 32)
    ) {
  		return true;
  	}else {
  	  return false;
  	}
  })
})

$(document).ready(function() {
  $('#tel').keypress(function(e){
  	if (
      (e.charCode > 46 && e.charCode < 59) ||
      (e.charCode  == 40) ||
      (e.charCode  == 41) ||
      (e.charCode  == 0)  ||
      (e.charCode  == 45) ||
      (e.charCode  == 32)
    ) {
  		return true;
  	}else {
  	  return false;
  	}
  })
})

$(document).ready(function() {
  $('#email').keypress(function(e){
  	if (
      (e.charCode  > 64 && e.charCode  < 91) ||
      (e.charCode  > 96 && e.charCode  < 123) ||
      (e.charCode  == 64) ||
      (e.charCode  == 45) ||
      (e.charCode  == 46) ||
      (e.charCode  == 0)  ||
      (e.charCode  == 95)
    ) {
  		return true;
  	}else {
  	  return false;
  	}
  })
})
