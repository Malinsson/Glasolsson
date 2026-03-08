//price slider

const slider = document.getElementById("priceSlider");
const display = document.getElementById("priceDisplay");
slider.addEventListener("input", () => {
    display.textContent = slider.value + " kr";
});
