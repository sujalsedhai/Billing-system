
function validateQuantity() {
    var quantity = document.forms["register"]["quantity"].value;
    var quantityRegex = /^[1-9][0-9]*$/;

    if (!quantityRegex.test(quantity)) {
        document.getElementById('quantity-error').innerHTML = "Please enter a valid quantity";
        return false;
    } else {
        document.getElementById('quantity-error').innerHTML = "";
        return true;
    }
}

function validateName() {
    var name = document.forms["register"]["name"].value;
    var nameRegex = /^[a-zA-Z \s]+$/;

    if (!nameRegex.test(name)) {
        document.getElementById('name-error').innerHTML = "Please enter characters only";
        return false;
    } else {
        document.getElementById('name-error').innerHTML = "";
        return true;
    }
}

function validatePrice() {
    var price = document.forms["register"]["price"].value;
    var priceRegex = /^[0-9]+(\.[0-9]{1,2})?$/;

    if (!priceRegex.test(price) || parseFloat(price) <= 0) {
        document.getElementById('price-error').innerHTML = "Please enter a valid price";
        return false;
    } else {
        document.getElementById('price-error').innerHTML = "";
        return true;
    }
}

function clearMessage() {
    document.getElementById('quantity-error').innerHTML = "";
    document.getElementById('name-error').innerHTML = "";
    document.getElementById('price-error').innerHTML = "";
}

function validateForm() {
    clearMessage();

    if (!validateQuantity() || !validateName() || !validatePrice()) {
        return false;
    }
    return true;
}
