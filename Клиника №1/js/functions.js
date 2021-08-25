const DELAY = 500;

$(document).ready(function() {
  
$(".navig a").on('click',  function() {
  $("html, body").stop().animate({
    scrollTop: $($(this).attr("href")).offset().top - $(".menu").innerHeight()
  }, DELAY);
});

$(".price a").on('click',  function() {
  $("html, body").stop().animate({
    scrollTop: $($(this).attr("href")).offset().top - $(".menu").innerHeight()
  }, DELAY);
});

});