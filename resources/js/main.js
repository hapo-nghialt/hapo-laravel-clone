$(document).ready(function() {
    $('.btn-header').click(function() {
        $('.btn-icon').toggleClass('fa-times');
        $('.btn-icon').toggleClass('fa-bars');
    });

    $(".btn-chat").click(() => {
        $("div.chat-content").fadeToggle();
    });

    $('.comment').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        adaptiveHeight: false,
        autoplay: true,
        autoplaySpeed : 3000,
        pauseOnFocus: true,
        pauseOnHover: true,
        prevArrow:'<button type="button" class="button-prev fa fa-angle-left"></button>',
                nextArrow:'<button type="button" class="button-next fa fa-angle-right"></button>', 
  
        responsive: [
          {
            breakpoint: 780,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
    });

    $('[data-toggle="tooltip"]').tooltip();
});
