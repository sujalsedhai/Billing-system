
function validateName() {
    var name = document.forms["register"]["employeename"].value;
    var nameRegex = /^[a-zA-Z \s]+$/;

    if (!nameRegex.test(name)) {
        document.getElementById('name-error').innerHTML = "Please enter characters only";
        return false;
    } else {
        document.getElementById('name-error').innerHTML = "";
        return true;
    }
}

function validateEmail() {
    var email = document.forms["register"]["email"].value;
    var emailRegex = /^[^@]+@(yahoo|gmail|hotmail)\.(com|com\.np|net|org)$/;

    if (!emailRegex.test(email)) {
        document.getElementById('email-error').innerHTML = "Please enter a valid email";
        return false;
    } else {
        document.getElementById('email-error').innerHTML = "";
        return true;
    }
}

function validatePhone() {
    var phone = document.forms["register"]["phone"].value;
    var phoneRegex = /^[0-9]{10}$/;

    if (!phoneRegex.test(phone)) {
        document.getElementById('phone-error').innerHTML = "Please enter a valid phone number";
        return false;
    } else {
        document.getElementById('phone-error').innerHTML = "";
        return true;
    }
}

function validatePasswords2() {
    var password = document.getElementById('password').value;
    var message = "";
    if (password.trim().length === 0) {
        message = "Please create a password";
    } else if (password.length < 5) {
        message = "Password is too short";
    } else if (/[a-zA-Z]/.test(password) && /\d/.test(password) && /[\W_]/.test(password)) {
        message = "Strong password";
    } else {
        message = "Weak password";
    }
    document.getElementById('password-error').innerHTML = message;
    return message === "Strong password";
}

function clearMessage() {
    document.getElementById('name-error').innerHTML = "";
    document.getElementById('email-error').innerHTML = "";
    document.getElementById('phone-error').innerHTML = "";
    document.getElementById('password-error').innerHTML = "";
}

function validateForm() {
    clearMessage();

    if (!validateName() || !validateEmail() || !validatePhone() || !validatePasswords2()) {
        return false;
    }
    return true;
}
