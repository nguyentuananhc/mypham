(function () {
  $(document).scroll(() => {
    const header = $('.main-header')
    if ($(document).scrollTop()) {
      header.addClass('is-sticky')
    } else {
      header.removeClass('is-sticky')
    }
  })

  $('.fa-arrow-circle-o-up').click(function () {
    $('html, body').animate({
      scrollTop: 0,
    }, 800);
  })

  $('.fa-search').click(function () {
    $('.search-header').fadeToggle()
  })

  $('.shelf-list').owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    responsive: {
      0: {
        items: 2
      },
      600: {
        items: 3
      },
      1000: {
        items: 5
      }
    }
  })

  $('.deal-slider').owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    responsive: {
      0: {
        items: 2
      },
      600: {
        items: 2
      },
      1000: {
        items: 2
      }
    }
  })
})()