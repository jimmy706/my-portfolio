const main = document.getElementById("main-content");
const btnTop = document.getElementById("btn-top");

main.addEventListener("scroll", (e) => {
    if (main.scrollTop > 200) {
        btnTop.style.right = "40px";
    }
    else {
        btnTop.style.right = "-40px";
    }
});

btnTop.addEventListener("click", () => {
    main.scroll({
        top: 0,
        behavior: 'smooth'
    })
})