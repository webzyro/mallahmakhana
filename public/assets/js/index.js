function toggleDropdown() {
    document.getElementById("dropdownBox").classList.toggle("show");
}

function toggleMobileDropdown() {
    document.getElementById("mobileDropdownBox").classList.toggle("show");
}

// Close dropdown when clicking outside
document.addEventListener("click", function (e) {
    // Desktop Dropdown
    const box = document.getElementById("dropdownBox");
    const btn = document.querySelector(".user-btn");
    if (box && btn && !btn.contains(e.target) && !box.contains(e.target)) {
        box.classList.remove("show");
    }

    // Mobile Dropdown
    const mobileBox = document.getElementById("mobileDropdownBox");
    const mobileBtn = document.querySelector(".mobile-avatar-btn");

    // Only run if elements exist (mobile view)
    if (
        mobileBox &&
        mobileBtn &&
        !mobileBtn.contains(e.target) &&
        !mobileBox.contains(e.target)
    ) {
        mobileBox.classList.remove("show");
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
