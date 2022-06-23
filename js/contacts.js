$('.right-block__cotact').click(function (event) {
  event.preventDefault();
  if ($('.right-block__numberPhone').css('display') == 'none') {
    $('.right-block__numberPhone').css('display', 'block');
    $('.right-block__cotact').html('Скрыть номер');
  } else {
    $('.right-block__numberPhone').css('display', 'none');
    $('.right-block__cotact').html('Показать номер');
  }
});