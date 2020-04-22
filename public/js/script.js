// $(document).ready(function () {
//     $(".initial").eq(0).css("all", "initial")
//     console.log("ready!");
// });
function sliderProduct(selector) {
    $(selector).slick({
        dots: true,
        arrows: true,
        appendArrows: '.slider-arrows',
        prevArrow: '<span class="slider-arrow"><i class="fa fa-angle-left" aria-hidden="true"></i></span>',
        nextArrow: '<span class="slider-arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span>',
        infinite: false,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 5,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 962,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 712,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 486,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
}

$(document).on('ready', function () {
    sliderProduct('.slider_product');
});
