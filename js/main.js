$(document).ready(function() {
  $('.goto-nosotros').on('click', function(){
    window.location.href = "nosotros.html";
  });
  $('.goto-siniestro').on('click', function(){
    window.location.href = "siniestro.html";
  });
  $('.goto-productos').on('click', function(){
    window.location.href = "productos.html";
  });
  $('.lapya-logo').on('click', function(){
    window.location.href = "index.html";
  });

  $('.hamburguer-toolbar-inner').on('click', function(e){
    if ($(e.currentTarget).find('.hamb-close').hasClass('toOpen')) {
      $('.hamb-close').removeClass('toOpen');
      $('.hamb-stick-1').addClass('toOpen');
      $('.hamb-close').hide(300);
      $('.hamb-stick-1').show(300);
      $('.hamb-stick-2').show(300);
      $('.hamb-stick-3').show(300);
      $('.full-screen-menu').hide(100);
      return;
    }
    if ($(e.currentTarget).find('.hamb-stick-1').hasClass('toOpen')) {
      $('.hamb-stick-1').removeClass('toOpen');
      $('.hamb-close').addClass('toOpen');
      $('.hamb-stick-1').hide(300);
      $('.hamb-stick-2').hide(300);
      $('.hamb-stick-3').hide(300);
      $('.hamb-close').show(300);
      $('.full-screen-menu').show(100);
      return;
    }
  });
});
