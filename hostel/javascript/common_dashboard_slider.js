//i dont know what this does
document.addEventListener("DOMContentLoaded", () => {
    console.log("Home page loaded.");
});

// Slider Banner script
document.addEventListener("DOMContentLoaded", () => {
    const uniqueSlider = document.querySelector(".unique-slider");
    const uniqueSlides = document.querySelectorAll(".unique-slide");
    const uniquePrevButton = document.querySelector(".unique-prev-btn");
    const uniqueNextButton = document.querySelector(".unique-next-btn");
    
    let uniqueCurrentIndex = 0;

    function updateUniqueSlider() {
        const uniqueOffset = -uniqueCurrentIndex * 100;
        uniqueSlider.style.transform = `translateX(${uniqueOffset}%)`;
    }

    function showNextUniqueSlide() {
        uniqueCurrentIndex = (uniqueCurrentIndex + 1) % uniqueSlides.length;
        updateUniqueSlider();
    }

    function showPrevUniqueSlide() {
        uniqueCurrentIndex = (uniqueCurrentIndex - 1 + uniqueSlides.length) % uniqueSlides.length;
        updateUniqueSlider();
    }

    uniqueNextButton.addEventListener("click", showNextUniqueSlide);
    uniquePrevButton.addEventListener("click", showPrevUniqueSlide);

    // Optional: Auto-slide every 5 seconds
    setInterval(showNextUniqueSlide, 5000);
});
