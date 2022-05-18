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

const backButton = () => {
    window.location.href = "../index.php";
}


const registerButton = () =>{
    window.location.href = "../register.php";
}

const AccountList = () =>{
    window.location.href = "../admin/account-list.php";
}

const PostList = () =>{
    window.location.href = "../admin/posts-list.php";
}

let count = 0;
if (count == 0){
    document.querySelector(".edit-password").style.display = "none";
    count++;
}
const EditPassword = () => {
    console.log(count);
    if(count == 0 || count % 2 == 0){
        document.querySelector(".edit-password").style.display = "none";
        count++;
    } else{
        document.querySelector(".edit-password").style.display = "block";
        count++;
    }
    
}