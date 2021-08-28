const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

hamburger.addEventListener("click", mobileMenu);

function mobileMenu() {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
}

const navLink = document.querySelectorAll(".nav-link");

navLink.forEach(n => n.addEventListener("click", closeMenu));


function closeMenu() {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
}

const obseverOption = {

    root: null,
    rootMargin: "0px 0px 0px 0px",
    threshold: 1
};
function observerCallback(entries, observer){
    
    entries.forEach(entry =>{
        if(entry.isIntersecting){
            entry.target.classList.replace('fadeOut','fade');
        }else{
            entry.target.classList.replace('fadeIn','fadeOut');
        }
    });
}
const observer = new IntersectionObserver(observerCallback, obseverOption)
const Fade = document.querySelectorAll('.fade');
Fade.forEach(a => {observer.observe(a)})

