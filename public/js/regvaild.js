
var name = document.forms['register']['name'];
var email = document.forms['register']['email'];
var city = document.forms['register']['city'];
var phone = document.forms['register']['phone'];
var password = document.forms['register']['password'];
var password_confirm = document.forms['register']['password_confirmation'];
var type = document.forms['register']['type'];

var name_error = document.getElementById('error_name');
var email_error = document.getElementById('error_email');
var city_error = document.getElementById('error_city');
var phone_error = document.getElementById('error_phone');
var password_error = document.getElementById('error_password');
var type_error = document.getElementById('error_type');


name.addEventListener('blur', nameVerify, true);
email.addEventListener('blur', emailVerify, true);
city.addEventListener('blur', cityVerify, true);
phone.addEventListener('blur', phoneVerify, true);
password.addEventListener('blur', passwordVerify, true);
type.addEventListener('blur', typeVerify, true);

function vaildResigter(){
    // validate username
    if (name.value == "") {
        // name.style.border = "1px solid red";
        document.getElementById('name').style.color = "red";
        name_error.textContent = "name is required";
        name.focus();
        return false;
    }
    // validate username
    if (name.value.length < 3) {
        // name.style.border = "1px solid red";
        document.getElementById('name').style.color = "red";
        name_error.textContent = "Username must be at least 3 characters";
        name.focus();
        return false;
    }
    // validate email
    if (email.value == "") {
        email.style.border = "1px solid red";
        document.getElementById('email').style.color = "red";
        email_error.textContent = "Email is required";
        email.focus();
        return false;
    }

    // validate city
    if (city.value == "") {
        city.style.border = "1px solid red";
        document.getElementById('city').style.color = "red";
        city_error.textContent = "city is required";
        city.focus();
        return false;
    }


    // validate city
    if (city.value.length < 3) {
        city.style.border = "1px solid red";
        document.getElementById('city').style.color = "red";
        city_error.textContent = "city must be at least 3 characters";
        city.focus();
        return false;
    }

    var num = /^(012|011|010|015)[0-9]{9}/;
    if(phone.value.match(num)==false){
        phone.style.border = "1px solid red";
        document.getElementById('phone').style.color = "red";
        phone_error.textContent = "it is wrong number";
        phone.focus();
        return false;
    }

    // validate password
    if (password.value == "") {
        password.style.border = "1px solid red";
        document.getElementById('password').style.color = "red";
        // password_confirm.style.border = "1px solid red";
        password_error.textContent = "Password is required";
        password.focus();
        return false;
    }
    // check if the two passwords match
    if (password.value != password_confirm.value) {
        password.style.border = "1px solid red";
        document.getElementById('re_password').style.color = "red";
        password_confirm.style.border = "1px solid red";
        password_error.innerHTML = "The two passwords do not match";
        return false;
    }
}

function nameVerify() {
    if (username.value != "") {
        username.style.border = "1px solid #5e6e66";
        document.getElementById('name').style.color = "#5e6e66";
        name_error.innerHTML = "right";
        return true;
    }
}
function emailVerify() {
    if (email.value != "") {
        email.style.border = "1px solid #5e6e66";
        document.getElementById('email').style.color = "#5e6e66";
        email_error.innerHTML = "right";
        return true;
    }
}
function passwordVerify() {
    if (password.value != "") {
        password.style.border = "1px solid #5e6e66";
        // document.getElementById('pass_confirm_div').style.color = "#5e6e66";
        document.getElementById('password').style.color = "#5e6e66";
        password_error.innerHTML = "right";
        return true;
    }
    if (password.value === password_confirm.value) {
        password.style.border = "1px solid #5e6e66";
        document.getElementById('re_password').style.color = "#5e6e66";
        password_error.innerHTML = "";
        return true;
    }
}
