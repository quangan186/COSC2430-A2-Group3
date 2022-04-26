const menuButton = () => {
    document.getElementById("phone-menu").style.transform = "translateX(0)";
    document.getElementById("phone-menu").style.opacity = "1";
}

const closeButton = () => {
    document.getElementById("phone-menu").style.transform = "translateX(100%)";
    document.getElementById("phone-menu").style.opacity = "0";
}

const adminMenuButton = () => {
    document.querySelector(".sidebar-menu").style.transform = "translateX(0)";
    document.querySelector(".sidebar-menu").style.opacity = "1";
}

const adminCloseButton = () => {
    document.querySelector(".sidebar-menu").style.transform = "translateX(100%)";
    document.querySelector(".sidebar-menu").style.opacity = "0";
}

let navButtons = document.getElementsByClassName("btn");
for (let i = 0; i < navButtons.length; i++){
    navButtons[i].onclick = () => {
        this.classList.add("active")
    }
}