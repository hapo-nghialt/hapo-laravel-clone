$(document).ready(function() {
    $('.login').click(function() {
        $('.modal-content-login').css({'background-color': '#B2D235'});
        $('.login').css({'color': '#FFFFFF'});
        $('.modal-content-register').css({'background-color': '#FFFFFF'});
        $('.register').css({'color': '#B2D235'});
    });

    $('.register').click(function() {
        $('.modal-content-login').css({'background-color': '#FFFFFF'});
        $('.login').css({'color': '#B2D235'});
        $('.modal-content-register').css({'background-color': '#B2D235'});
        $('.register').css({'color': '#FFFFFF'});
    });

    $('.logout').click(function() {
        $('.form-logout').submit();
    });

    if ($("#login input").hasClass("is-invalid")) {
        $("#myModal").modal("show");
    }

    if ($("#register input").hasClass("is-invalid")) {
        $("#myModal").modal("show");
        $('.register').trigger("click");
    }

    $('.btn-header').click(function() {
        $('.btn-icon').toggleClass('fa-times');
        $('.btn-icon').toggleClass('fa-bars');
    });

    $('.btn-chat').click(() => {
        $('div.chat-content').fadeToggle();
    });

    $('.comment').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        adaptiveHeight: false,
        autoplay: true,
        autoplaySpeed: 3000,
        pauseOnFocus: true,
        pauseOnHover: true,
        prevArrow:
            "<button type='button' class='button-prev fa fa-angle-left'></button>",
        nextArrow:
            "<button type='button' class='button-next fa fa-angle-right'></button>",

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

    $("[data-toggle='tooltip']").tooltip();
});
