//price slider

const slider = document.getElementById("priceSlider");
const display = document.getElementById("priceDisplay");

slider.addEventListener("input", function () {
    display.textContent = slider.value + " kr";
});
