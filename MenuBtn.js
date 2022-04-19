const menuButton = () => {
    document.getElementById("phone_menu").style.transform = "translateX(0)";
    document.getElementById("phone_menu").style.opacity = "1";
}

const closeButton = () => {
    document.getElementById("phone_menu").style.transform = "translateX(100%)";
    document.getElementById("phone_menu").style.opacity = "0";
}