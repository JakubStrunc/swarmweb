window.onscroll = function() {
    var navbar = document.getElementById("mainNav");
    if (window.scrollY > 0) {
        navbar.classList.add("navbar-scrolled");
    } else {
        navbar.classList.remove("navbar-scrolled");
    }
};