const menuButton = () => {
    document.getElementById("phone-menu").style.transform = "translateX(0)";
    document.getElementById("phone-menu").style.opacity = "1";
}

const closeButton = () => {
    document.getElementById("phone-menu").style.transform = "translateX(100%)";
    document.getElementById("phone-menu").style.opacity = "0";
}

window.addEventListener('scroll', () => {
    const scrolled = window.scrollY;
    const developers = document.querySelectorAll(".developer");
    if (scrolled > 0){ 
        developers.forEach(dev => {
            dev.style.transform = "translateX(0)";
            dev.style.opacity = "1";
        })
    } else{
        developers.forEach(dev => {
            dev.style.transform = "translateX(-200%)";
            dev.style.opacity = "0";
        })
    }
})