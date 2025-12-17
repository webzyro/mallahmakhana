// Ensure functions are global
window.toggleDropdown = function() {
    document.getElementById("dropdownBox").classList.toggle("show");
}

window.toggleMobileDropdown = function() {
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

document.addEventListener('DOMContentLoaded', function() {
    const variantSelect = document.getElementById("variant-select");
    if (variantSelect) {
        variantSelect.addEventListener("change", function () {
            const option = this.options[this.selectedIndex];
            const originalPriceElements = document.getElementsByClassName("original-price");
            if (originalPriceElements.length > 0) {
            originalPriceElements[0].innerText = option.dataset.price;
            }
            
            const stockElement = document.getElementById("stock");
            if(stockElement) {
                stockElement.innerText = "Stock: " + option.dataset.stock;
            }
        });
    }
});
