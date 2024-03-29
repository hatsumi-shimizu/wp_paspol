$(function() {
  $('.img-wrap img:nth-child(n+2)').hide();
      setInterval(function() {
        $(".img-wrap img:first-child").fadeOut(4000);
        $(".img-wrap img:nth-child(2)").fadeIn(4000);
        $(".img-wrap img:first-child").appendTo(".img-wrap");
      }, 8000);
});

$(function() {
  $("#up-arrow").click(function() {
    $('html, body').animate({
      scrollTop: 0
    }, 1300);
  });
});

