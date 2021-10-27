    /* Navbar showing on mobile and burger animation */

function navBurger() {
    var element = document.querySelector(".navbar");
    var burger = document.querySelector(".burger-btn");
    var x = document.getElementsByTagName('main')[0];
    element.classList.toggle("extended");
    x.classList.toggle("extended");
    burger.classList.toggle("open");
}
