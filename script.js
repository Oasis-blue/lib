var toggle = document.querySelector(".toggle");
var menu = document.querySelector(".menu");
 
/* Toggle mobile menu */
function toggleMenu() {
    if (menu.classList.contains("active")) {
        menu.classList.remove("active");
         
        // adds the menu (hamburger) icon
        toggle.querySelector("a").innerHTML = "<i class='fa-solid fa-bars'></i>";
    } else {
        menu.classList.add("active");
         
        // adds the close (x) icon<i class=""></i>
        toggle.querySelector("a").innerHTML = "<i class='fa-solid fa-xmark'></i>";
    }
}
 
/* Event Listener */
toggle.addEventListener("click", toggleMenu, false);