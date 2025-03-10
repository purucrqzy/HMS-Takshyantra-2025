//i dont know what this does
document.addEventListener("DOMContentLoaded", () => {
    console.log("hostel manager adding and removing page loaded.");
});


//form sliders script

document.addEventListener("DOMContentLoaded", () => {
    const addFormBtn = document.getElementById("unique-add-form-btn");
    const removeFormBtn = document.getElementById("unique-remove-form-btn");
    const formSlider = document.querySelector(".unique-form-slider");

    // Slide between forms
    addFormBtn.addEventListener("click", () => {
        formSlider.style.transform = "translateX(0)";
    });

    removeFormBtn.addEventListener("click", () => {
        formSlider.style.transform = "translateX(-50%)";
    });

    // Clear forms
    document.getElementById("unique-clear-add-form").addEventListener("click", () => {
        document.getElementById("unique-add-form").reset();
    });

    document.getElementById("unique-clear-remove-form").addEventListener("click", () => {
        document.getElementById("unique-remove-form").reset();
    });
});
