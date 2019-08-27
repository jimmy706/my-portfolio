const overlay = document.getElementById("overlay-mb");
const toggle = document.getElementById("toggle-nav");

overlay.addEventListener("click", () => {
    toggle.checked = false;
})