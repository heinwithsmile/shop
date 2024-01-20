// console.log("test");
// const hamburger = document.querySelector(".hamburger");
// const navbar = document.querySelector(".navbar");

// hamburger.addEventListener("click", () => {
//     hamburger.classList.toggle("active");
//     navbar.classList.toggle("active");
// });

// let slideIndex = 1;
// showSlides(slideIndex);

// // Next/previous controls
// function plusSlides(n) {
//     showSlides((slideIndex += n));
// }

// // Thumbnail image controls
// function currentSlide(n) {
//     showSlides((slideIndex = n));
// }

// function showSlides(n) {
//     let i;
//     let slides = document.getElementsByClassName("mySlides");
//     let dots = document.getElementsByClassName("dot");
//     if (n > slides.length) {
//         slideIndex = 1;
//     }
//     if (n < 1) {
//         slideIndex = slides.length;
//     }
//     for (i = 0; i < slides.length; i++) {
//         slides[i].style.display = "none";
//     }
//     // for (i = 0; i < dots.length; i++) {
//     //   dots[i].className = dots[i].className.replace(" active", "");
//     // }
//     slides[slideIndex - 1].style.display = "block";
//     dots[slideIndex - 1].className += " active";
// }

// // tags
// function openMenu(menuItem) {
//     var i;
//     var x = document.getElementsByClassName("menu");
//     for (i = 0; i < x.length; i++) {
//         x[i].style.display = "none";
//     }
//     document.getElementById(menuItem).style.display = "grid";
// }

const carousel = document.querySelector(".wrapper .carousel");
console.log(carousel);
images = carousel.querySelectorAll("img");
firstImg = carousel.querySelectorAll("img")[0];
hiddenItems = document.querySelectorAll(".hidden");
arrowIcons = document.querySelectorAll(".wrapper i");

let isDragStart = false,
    isDragging = false,
    prevPageX,
    prevScrollLeft,
    positionDiff;

const showHideIcons = () => {
    // showing and hiding prev/next icon according to carousel scroll left value
    let scrollWidth = carousel.scrollWidth - carousel.clientWidth; // getting max scrollable width
    arrowIcons[0].style.display = carousel.scrollLeft == 0 ? "none" : "block";
    arrowIcons[1].style.display =
        carousel.scrollLeft == scrollWidth ? "none" : "block";
};

arrowIcons.forEach((icon) => {
    icon.addEventListener("click", () => {
        let firstImgWidth = firstImg.clientWidth + 14; // getting first img width & adding 14 margin value
        // if clicked icon is left, reduce width value from the carousel scroll left else add to it
        carousel.scrollLeft +=
            icon.id == "left" ? -firstImgWidth : firstImgWidth;
        setTimeout(() => showHideIcons(), 60); // calling showHideIcons after 60ms
    });
});

const autoSlide = () => {
    // if there is no image left to scroll then return from here
    if (
        carousel.scrollLeft - (carousel.scrollWidth - carousel.clientWidth) >
            -1 ||
        carousel.scrollLeft <= 0
    )
        return;

    positionDiff = Math.abs(positionDiff); // making positionDiff value to positive
    let firstImgWidth = firstImg.clientWidth + 14;
    // getting difference value that needs to add or reduce from carousel left to take middle img center
    let valDifference = firstImgWidth - positionDiff;

    if (carousel.scrollLeft > prevScrollLeft) {
        // if user is scrolling to the right
        return (carousel.scrollLeft +=
            positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff);
    }
    // if user is scrolling to the left
    carousel.scrollLeft -=
        positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;
};

const dragStart = (e) => {
    // updatating global variables value on mouse down event
    isDragStart = true;
    prevPageX = e.pageX || e.touches[0].pageX;
    prevScrollLeft = carousel.scrollLeft;
};

const dragging = (e) => {
    // scrolling images/carousel to left according to mouse pointer
    if (!isDragStart) return;
    e.preventDefault();
    isDragging = true;
    carousel.classList.add("dragging");
    positionDiff = (e.pageX || e.touches[0].pageX) - prevPageX;
    carousel.scrollLeft = prevScrollLeft - positionDiff;
    showHideIcons();
};

const dragStop = () => {
    isDragStart = false;
    carousel.classList.remove("dragging");

    if (!isDragging) return;
    isDragging = false;
    autoSlide();
};

const showItem = (index) => {
    console.log(index);
    console.log(hiddenItems[index]);
    // Access your hidden items array and modify the specific item you want
    hiddenItems[index].classList.remove("hidden");
    hiddenItems[index].classList.add("show");
};

carousel.addEventListener("mousedown", dragStart);
carousel.addEventListener("touchstart", dragStart);

document.addEventListener("mousemove", dragging);
carousel.addEventListener("touchmove", dragging);

document.addEventListener("mouseup", dragStop);
carousel.addEventListener("touchend", dragStop);
