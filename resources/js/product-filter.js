//price slider

const slider = document.getElementById("priceSlider");
const display = document.getElementById("priceDisplay");

if (slider && display) {
    slider.addEventListener("input", function () {
        display.textContent = slider.value + " kr";
    });
}
