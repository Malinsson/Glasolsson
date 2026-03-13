const form = document.getElementById("filter-form");
const slider = document.getElementById("priceSlider");
const display = document.getElementById("priceDisplay");


if (form) {
    form.querySelectorAll("select").forEach(function (select) {
        select.addEventListener("change", function () {
            form.submit();
        });
    });
    
    slider.addEventListener("input", function () {
        display.textContent = slider.value + " kr";
    });
    
    slider.addEventListener("change", function () {
        form.submit();
    });
}
