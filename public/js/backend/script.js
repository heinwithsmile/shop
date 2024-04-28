const hamBurger = document.querySelector(".toggle-btn");
hamBurger.addEventListener("click", function() {
    // console.log("Okay")
    document.querySelector("#sidebar").classList.toggle("expand");
});