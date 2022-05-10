let email = document.getElementById("email");
let password = document.getElementById("password");
let retypePassword = document.getElementById("retype-password");
let avatar = document.getElementById("avatar");
let firstName = document.getElementById("fname");
let lastName = document.getElementById("lname");
let registerButton = document.querySelector(".register-button");

let invalidEmail = document.getElementById("invalid-email");
let invalidPassword = document.getElementById("invalid-password");
let invalidRetypePassword = document.getElementById("invalid-retype-password");
let invalidAvatar = document.getElementById("invalid-image");
let invalidFirstName = document.getElementById("invalid-first-name");
let invalidLastName = document.getElementById("invalid-last-name");
let invalidForm = document.getElementById("invalid-form");

let checkEmail = /^([a-zA-Z0-9\._]+)@([a-zA-Z0-9])+.([a-z]+)(.[a-z]+)?$/;
let checkPassword =/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,20}$/;
let checkName = /^[a-zA-Z0-9]{2,20}$/;

const validateEmail = () => {
    if (email.value.length == 0){
        invalidEmail.innerHTML = "* Required";
        email.style.border = "1px solid black";
        return false;
    }
    if (!checkEmail.test(email.value) || email.value.includes("..")){
        invalidEmail.innerHTML = "Invalid email";
        email.style.border = "2px solid red";
        return false;
    }
    invalidEmail.innerHTML = '<i class="fa-solid fa-check"></i>';
    email.style.border = "2px solid seagreen";
    return true;
}

const validatePassword = () => {
    if (password.value.length == 0){
        invalidPassword.innerHTML = "* Required";
        password.style.border = "1px solid black";
        return false;
    }
    if (!checkPassword.test(password.value)){
        invalidPassword.innerHTML = "Invalid password!";
        password.style.border = "2px solid red";
        return false;
    }
    invalidPassword.innerHTML = '<i class="fa-solid fa-check"></i>';
    password.style.border = "2px solid seagreen";
    return true;
}

const validateRetypePassword = () =>{
    if (retypePassword.value.length == 0){
        invalidRetypePassword.innerHTML = "* Required";
        retypePassword.style.border = "1px solid black";
        return false;
    }
    if (retypePassword.value.length !== password.value.length || retypePassword.value !== password.value){
        invalidRetypePassword.innerHTML = "Invalid password!";
        retypePassword.style.border = "2px solid red";
        return false;
    }
    invalidRetypePassword.innerHTML = '<i class="fa-solid fa-check"></i>';
    retypePassword.style.border = "2px solid seagreen";
    return true;
}

const validateFirstName = () => {
    if (firstName.value.length == 0){
        invalidFirstName.innerHTML = "* Required";
        firstName.style.border = "1px solid black";
        return false;
    }
    if (!checkName.test(firstName.value)){
        invalidFirstName.innerHTML = "Invalid Name!";
        firstName.style.border = "2px solid red";
        return false;
    }
    invalidFirstName.innerHTML = '<i class="fa-solid fa-check"></i>';
    firstName.style.border = "2px solid seagreen";
    return true;
}

const validateLastName = () =>{
    if (lastName.value.length == 0){
        invalidLastName.innerHTML = "* Required";
        lastName.style.border = "1px solid black";
        return false;
    }
    if (!checkName.test(lastName.value)){
        invalidLastName.innerHTML = "Invalid Name!";
        lastName.style.border = "2px solid red";
        return false;
    }
    invalidLastName.innerHTML = '<i class="fa-solid fa-check"></i>';
    lastName.style.border = "2px solid seagreen";
    return true;
}

// const validateForm = () =>{
//     if (!validateEmail() || !validatePassword() || !validateRetypePassword() || !validateFirstName() || !validateLastName()){
//         invalidForm.innerHTML = "Invalid Form. Please re-fill the form!";
//         setTimeout(() => {invalidForm.style.display = "none";}, 3000);
//         return false;
//     }
//     invalidForm.style.display = "block";
//     invalidForm.innerHTML = "Register successfully";
//     invalidForm.style.color = "seagreen";
//     setTimeout(() => {invalidForm.style.display = "none";}, 3000);
//     // window.location.href = "../loginandregister.php";
//     return true;
// }       