const burgerBtn = document.getElementById('burgerBtn')
const menu = document.getElementById('menu')
const overlay = document.getElementById('overlay')
const menuLinks = document.querySelectorAll('nav a')

// OPEN AND CLOSE MENU
burgerBtn.addEventListener('click', () => {
    burgerBtn.classList.toggle('active')    //if open then add "active" else remove it
    menu.classList.toggle('open')
    overlay.classList.toggle('active')
});

// CLOSE MENU BY CLICKING ON OVERLAY
overlay.addEventListener('click', () => {
    burgerBtn.classList.remove('active')
    menu.classList.remove('open')
    overlay.classList.remove('active')
});

// CLOSE MENU BY CLICKING ON PAGE
menuLinks.forEach(link => {
    link.addEventListener('click', () => {
        burgerBtn.classList.remove('active')
        menu.classList.remove('open')
        overlay.classList.remove('active')
    });
});

// FAQ PAGE
function toggleAnswer(element) {
    const answer = element.nextElementSibling;  // returns the next element at the same level
    const icon = element.querySelector('.faq-icon')
    
    // CLOSE OTHER ANSWERS
    document.querySelectorAll('.faq-answer').forEach(item => {
        if (item !== answer) {
            item.classList.remove('active')
        }
    });
    
    document.querySelectorAll('.faq-icon').forEach(item => {
        if (item !== icon) {
            item.classList.remove('active')
        }
    });
    
    // SHOW / HIDE THE ANSWER
    answer.classList.toggle('active')
    icon.classList.toggle('active')
}

// FORM

let form = document.querySelector("form")
if (form !== null){
form.addEventListener("submit", function(event) {
    event.preventDefault();
    console.log("Envoi du form détecté !")

    let loader = document.querySelector(".animLoader"); // when clicking submit, the loader animation is revealed
    loader.classList.add("visible");

    setTimeout(function(){      // the function is called after waiting for 2 sec (for the loader animation)

        let email = document.querySelector("#email")
        let pseudo = document.querySelector("#pseudo")
        let password = document.querySelector("#password")
        let errorContainer = document.querySelector(".message-error")
        let successContainer = document.querySelector(".message-succes")
        let errorList = document.querySelector(".message-error")

        errorList.replaceChildren()                     // remove the errors if some were found the last time clicking "submit"
        errorContainer.classList.remove("visible")      // hide the pop-up for the errors
        errorContainer.classList.add("visible")
        successContainer.classList.remove("visible")    // hide the pop-up for the form successfully sent
        loader.classList.remove("visible")              // hide the loader

        if (email.value == "") {        // check the email 
            console.log("invalide")
        } else {
            email.classList.add("success")
        }

        let passCheck = new RegExp(
        "^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[-+_!@#$%^&*.,?]).+$");

        if (password.value.length < 10 || passCheck.test(password.value) == false) {    // check the password
            errorContainer.classList.add("visible");
            password.classList.remove("success");

            let err = document.createElement("li");
            err.innerText = "Le mot de passe doit faire 10 caractères minimum, contenir minuscule, majuscule, chiffre, caractère spécial"

            errorList.appendChild(err)
        } else {
            password.classList.add("success")
        }
            if (email.classList.contains("success") && password.classList.contains("success"))
                {
                    errorContainer.classList.remove("visible")
                    form.submit();
                }

        }, 2000);
})
}

// DARK MODE
function toggleDarkMode() {
    const body = document.body;
    const button = document.querySelector('.dark-mode-toggle')
    
    body.classList.toggle('dark-mode')
    
    // CHANGE NAME BUTTON
    if (body.classList.contains('dark-mode')) {
        button.textContent = 'Light Mode'
    } else {
        button.textContent = 'Dark Mode'
    }
    
    // SAVE PREFS WHEN GOING ON ANOTHER PAGE
    if (body.classList.contains('dark-mode')) {
        localStorage.setItem('darkMode', 'enabled')     //localStorage : save data permanently as 'key:value'
    } else {
        localStorage.setItem('darkMode', 'disabled')
    }
}

document.addEventListener('DOMContentLoaded', function() {      //DOMContentLoaded : when the html page is fully loaded
    const darkMode = localStorage.getItem('darkMode')
    const button = document.querySelector('.dark-mode-toggle')
    
    if (darkMode === 'enabled') {
        document.body.classList.add('dark-mode')
        if (button) {
            button.textContent = 'Light Mode'
        }
    }
});
