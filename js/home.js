let slideIndex = 1;
showSlides(slideIndex);

// Auto slide every 5 seconds
setInterval(function () {
    plusSlides(1);
}, 5000);

// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");

    if (n > slides.length) {
        slideIndex = 1;
    }

    if (n < 1) {
        slideIndex = slides.length;
    }

    // Fade out all slides first
    for (i = 0; i < slides.length; i++) {
        slides[i].style.opacity = "0";
        slides[i].style.display = "none";
    }

    // Remove active class from all dots
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }

    // Show and fade in the current slide
    slides[slideIndex - 1].style.display = "block";
    setTimeout(function () {
        slides[slideIndex - 1].style.opacity = "1";
    }, 10);

    dots[slideIndex - 1].className += " active";
}
