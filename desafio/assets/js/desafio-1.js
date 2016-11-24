/* Davi Melk Mazo de Carvalho */

var slideIndex = 1;
mostraCarousel(slideIndex);

function trocaCarousel(n) {
  mostraCarousel(slideIndex = n);
}

function mostraCarousel(n)
{
  var i;
  var t = n+1;
  var x = document.getElementsByClassName("Slides");

  if (n >= x.length) {t = 1}
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}

  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }

  x[slideIndex-1].style.display = "block";

  $('.cr-badge').removeClass('ativado');
  $('#cr-badge-'+n).addClass('ativado');

  setTimeout(function(){ trocaCarousel(t) }, 4000);
}
