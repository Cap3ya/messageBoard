// Form's inputs
const input_firstName = document.querySelector("input[name='firstName']");
const input_lastName = document.querySelector("input[name='lastName']");
const input_email = document.querySelector("input[name='email']");
const textArea_message = document.querySelector("textarea[name='message']");
const input_submit = document.querySelector("input[type='submit']");

// Input's error msg
const error_firtName = document.querySelector("#error_firstName");
const error_lastName = document.querySelector("#error_lastName");
const error_email = document.querySelector("#error_email");
const error_message = document.querySelector("#error_message");

// Form textArea Chars Left
const span_nbCharsLeft = document.querySelector("#nbCharsLeft");
textArea_message.addEventListener("input", () => {
    const nbCharsLeft = 140 - parseInt(textArea_message.value.length);
    span_nbCharsLeft.textContent = nbCharsLeft + " " + (nbCharsLeft > 1 ? "chars" : "char");
})

// Validate Form 
function validateForm() {
    let isValid = true;

    // Regular expression for validating names
    const nameRegex = /^[a-zA-Z]+$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const messageRegex = /^[\s\S]{10,140}$/;


    if (!nameRegex.test(input_firstName.value)) {
        error_firtName.textContent = "Obligatoire"
        isValid = false;
    } else {
        error_firtName.textContent = ""
    }
    if (!nameRegex.test(input_lastName.value)) {
        error_lastName.textContent = "Obligatoire"
        isValid = false;
    } else {
        error_lastName.textContent = ""
    }
    if (!emailRegex.test(input_email.value)) {
        error_email.textContent = "Obligatoire"
        isValid = false;
    } else {
        error_email.textContent = ""
    }
    if (!messageRegex.test(textArea_message.value)) {
        error_message.textContent = "Obligatoire"
        isValid = false;
    } else {
        error_message.textContent = ""
    }

    return isValid;
}

// Prevent Form Submit 
input_submit.addEventListener("click", (event) => {
    if (validateForm() != true) {
        event.preventDefault();
    }
})