$(document).ready(function () {
    $(".sell-carousel").owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        dots: true,
        nav: false,
        smartSpeed: 1000,
        animateIn: "slideInRight",
        animateOut: "slideOutLeft",
        responsive: {
            0: {
                items: 2,
            },
            768: {
                items: 3,
            },
            992: {
                items: 3,
            },
        },
    });
});

document
    .getElementById("variant-select")
    .addEventListener("change", function () {
        const option = this.options[this.selectedIndex];
        document.getElementsByClassName("original-price").innerText =
            option.dataset.price;
        document.getElementById("stock").innerText =
            "Stock: " + option.dataset.stock;
    });
