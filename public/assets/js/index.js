function toggleDropdown() {
    document.getElementById("dropdownBox").classList.toggle("show");
}

// Close dropdown when clicking outside
document.addEventListener("click", function (e) {
    const box = document.getElementById("dropdownBox");
    const btn = document.querySelector(".user-btn");

    if (!btn.contains(e.target) && !box.contains(e.target)) {
        box.classList.remove("show");
    }
});

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
                items: 1,
            },
            768: {
                items: 2,
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
