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