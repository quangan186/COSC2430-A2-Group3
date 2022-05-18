const cookieContainer = document.querySelector('.cookie-container');

const userUnderstand = () => {
    // Create a variable in the local storage to checked if it is clicked
    sessionStorage.setItem("displayCookie", "true");

    // If the button is clicked, we will not display the box anymore, set the display atttribute to none
    document.querySelector('.cookie-container').style.display = 'none';
}

let checkSelectedUnderstand = sessionStorage.getItem("displayCookie");

if (!checkSelectedUnderstand){
    document.querySelector('.cookie-container').style.display = 'flex';
} else{
    document.querySelector('.cookie-container').style.display = 'none';
    
}

