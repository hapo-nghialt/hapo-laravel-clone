$(document).ready(function() {
    var login = document.getElementById("modal-login");
    var register = document.getElementById("modal-register");

    $(".login").click(function() {
        login.classList.add("focus-on");
        register.classList.remove("focus-on");
    });

    $(".register").click(function() {
        login.classList.remove("focus-on");
        register.classList.add("focus-on");
    });

    $(".logout").click(function() {
        $(".form-logout").submit();
    });

    if ($("#login input").hasClass("is-invalid")) {
        $("#myModal").modal("show");
    }

    if ($("#register input").hasClass("is-invalid")) {
        $("#myModal").modal("show");
        $(".register").trigger("click");
    }

    $(".btn-header").click(function() {
        $(".btn-icon").toggleClass("fa-times");
        $(".btn-icon").toggleClass("fa-bars");
    });

    $(".btn-chat").click(() => {
        $("div.chat-content").fadeToggle();
    });

    $(".comment").slick({
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

    $(".btn-learn").click(function() {
        $("#loginDefault, #registerDefault").val(
            $(this)
                .next()
                .val()
        );
    });

    $('#dataTables-example').DataTable();

    $(".btn-join-courses").click(function() {
        $("#loginDefault, #registerDefault").val(
            $(this)
                .next()
                .val()
        );
    });

    $(".btn-filter").click(function() {
        $(".filter-course").fadeToggle();
        $(".filter-course").removeClass("d-none");
    });

    let fiveStar = document.getElementById("five-star").value;
    let fourStar = document.getElementById("four-star").value;
    let threeStar = document.getElementById("three-star").value;
    let twoStar = document.getElementById("two-star").value;
    let oneStar = document.getElementById("one-star").value;
    $("#five-star-progress-bar").width(fiveStar);
    $("#four-star-progress-bar").width(fourStar);
    $("#three-star-progress-bar").width(threeStar);
    $("#two-star-progress-bar").width(twoStar);
    $("#one-star-progress-bar").width(oneStar);

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });

    $("input[name='rate']").click(function() {
        $(".rating-value").attr("value", $(this).val());
    });

    $(document).on("click", ".edit-modal", function() {
        $("#content-edit-review-modal").val($(this).data("content"));
        vote = $(this).attr("data-rate");
        $("#editstar" + vote).attr("checked", "true");
        var url = $(this).attr("data-url");
        $("#edit-review-modal").on("click", ".btn-edit-review", function() {
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    content: $("#content-edit-review-modal").val(),
                    rate: $(".rating-value").val()
                },
                success: function success(response) {
                    location.reload();
                }
            });
        });
    });

    $(document).on("click", ".icon-delete-review", function() {
        let url = $(this).attr("data-url");
        $.ajax({
            type: "DELETE",
            url: url,
            success: function(response) {
                console.log(response.review);
                let classReview = ".review-" + response.review;
                $(classReview).remove();
            }
        });
    });
});
