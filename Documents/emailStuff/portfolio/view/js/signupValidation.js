/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// GETTTING ALL TEXT ELEMENTS FROM SIGNUP.PHP
// GETTTING  ALL ERROR DISPLAY ELEMENTS FROM SIGNUP.PHP
// SETTING ALL EVENT LISTENERS ON REQUIRED ELEMENTS
let boolx = false;
function nameCheck() {

    var registerName = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
    var personName = document.getElementById("userSignupform").elements.namedItem("personName");
    var personName_error = document.getElementById('personName_error');
    personName.addEventListener('blur', nameVerify, true);

    NameCheck:{
        if (registerName.test(personName.value.toString())) {
            personName_error.innerHTML = " No Special characters are allowed in Name!";
            return false;
        } else if (personName.value.toString().trim() == "") {
            personName_error.innerHTML = " Name field required!";
            return false;
        } else if (personName.value.length < 6) {
            personName_error.innerHTML = " Name field length must be greater than 6 charecters!";
            return false;
        } else {
            personName_error.innerHTML = " Looks Good!";
            return true;
        }

    }

}
function dobCheck() {
    var dateOfBirth = document.getElementById("userSignupform").elements.namedItem('dateOfBirth');
    var dateOfBirth_error = document.getElementById('dateOfBirth_error');
    dateOfBirth.addEventListener('blur', dateOfBirthVerify, true);
    var today = new Date();
    var birthDate = new Date(dateOfBirth.value.toString());
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate()))
    {
        age--;
    }
    if (age < 18) {
        dateOfBirth_error.innerHTML = "Age Must be 18 or Above!";
        return false;
    } else {
        dateOfBirth_error.innerHTML = "Looks Good!";
        return true;
    }
}

function addressCheck() {
    var address = document.getElementById("userSignupform").elements.namedItem('address');
    var address_error = document.getElementById('address_error');
    address.addEventListener('blur', addressVerify, true);
    if (address.value.toString().length < 20 || address.value.toString().length > 100) {
        address_error.innerHTML = "Address length Must be in between 20 to 100 characters!";
        return false;
    } else {
        address_error.innerHTML = "Looks Good!";
        return true;
    }
}

function cellCheck() {
    var cellNumber = document.getElementById("userSignupform").elements.namedItem('cellNumber');
    var cellNumber_error = document.getElementById('cellNumber_error');
    cellNumber.addEventListener('blur', cellNumberVerify, true);
    if (isNaN(cellNumber.value)) {
        cellNumber_error.innerHTML = "Enter only numaric values!";
        return false;
    } else if (cellNumber.value.toString().trim() === "") {
        cellNumber_error.innerHTML = "Cell number must not be blank!!";
        return false;
    } else if (cellNumber.value.toString().length != 11) {
        cellNumber_error.innerHTML = "Cell number must be 11 numbers only!!";
        return false;
    } else {
        cellNumber_error.innerHTML = "Looks Good!";
        return true;
    }
}
function emailCheck() {
    var email = document.getElementById("userSignupform").elements.namedItem('email');
    var email_error = document.getElementById('email_error');
    var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    email.addEventListener('blur', emailVerify, true);
    if (!email.value.match(mailformat)) {
        email_error.innerHTML = "email format not valid!";
        return false;
    } else if (email.value.toString().trim() === "") {
        email_error.innerHTML = "email address must not be blank! ";
        return false;
    } else if (!email.value.toString().endsWith(".com")) {
        email_error.innerHTML = "email address must end with (.com)! ";
        return false;
    } else {
        email_error.innerHTML = "Looks Good! ";
        return true;
    }
}

function nationalityCheck() {
    var nationality = document.getElementById("userSignupform").elements.namedItem('nationality');
    var nationality_error = document.getElementById('nationality_error');
    nationality.addEventListener('blur', nationalityVerify, true);
    if (nationality.value === "") {
        nationality_error.innerHTML = "select your countery!";
        return false;
    } else {
        nationality_error.innerHTML = "Looks Good!";
        return true;
    }
}

function genderCheck() {
    var gender = document.getElementById("userSignupform").elements.namedItem('gender');
    var gender_error = document.getElementById('gender_error');
    gender.addEventListener('blur', genderVerify, true);
    if (gender.value == "") {
        gender_error.innerHTML = "select your gender!";
        return false;
    } else {
        gender_error.innerHTML = "Looks Good!";
        return true;
    }
}

function passwordCheck() {
    var passwords = document.getElementById("userSignupform").elements.namedItem('passwords');
    var retypePassword = document.getElementById("userSignupform").elements.namedItem('retypePassword');
    var passwords_error = document.getElementById('passwords_error');
    passwords.addEventListener('blur', passwordsVerify, true);
    retypePassword.addEventListener('blur', passwordsVerify, true);
    if (passwords.value === "" || retypePassword.value === "") {
        passwords_error.innerHTML = "blank password not allowed!";
        return false;
    } else if (passwords.value !== retypePassword.value) {
        passwords_error.innerHTML = "passwords do not match!";
        return false;
    } else if (passwords.value.toString().length < 6 || retypePassword.value.toString().length < 6) {
        passwords_error.innerHTML = "password length must be at least 6 characters!";
        return false;
    } else if (passwords.value === retypePassword.value) {
        passwords_error.innerHTML = "Looks Good!";
        return true;
    }
}

function submit(){
    var submit = document.getElementById("userSignupform").elements.namedItem('submit');
    var submit_error = document.getElementById('submit_error');
    submit.addEventListener('blur', submitVerify, true);
    if(boolx){
        submit.style.color = "#EEF733"; 
        submit_error.innerHTML = "Alert ! form submitted successfully.";
         alert("submited!");
        return true;
    }else if(!boolx){
        submit.style.color = "#FF5733";
        submit_error.innerHTML = "Alert ! form submittion failed.";
        alert("submittion Error!");
        return false;
    }
}

function test() {
    if (nameCheck() && dobCheck() && addressCheck() && cellCheck() && emailCheck() && nationalityCheck() && genderCheck() && passwordCheck()) {
        boolx = true; 
        submit();
        return true;
    } else {
        boolx = false; 
        submit();
        return false;
    }
    
}
function nameVerify() {
    if (nameCheck()) {
        personName.style.border = "1px solid #2E8B57";
        document.getElementById('personName').style.color = "#2E8B57";
        document.getElementById('personName_div').style.color = "#2E8B57";
        return true;
    } else if (!nameCheck()) {
        personName.style.border = "1px solid #FF5733";
        document.getElementById('personName').style.color = "#FF5733";
        document.getElementById('personName_div').style.color = "#FF5733";
        return false;
    }
}

function dateOfBirthVerify() {
    if (dobCheck()) {
        dateOfBirth.style.border = "1px solid #2E8B57";
        document.getElementById('dateOfBirth').style.color = "#2E8B57";
        document.getElementById('dateOfBirth_div').style.color = "#2E8B57";
        return true;
    } else if (!dobCheck()) {
        dateOfBirth.style.border = "1px solid #FF5733";
        document.getElementById('dateOfBirth').style.color = "#FF5733";
        document.getElementById('dateOfBirth_div').style.color = "#FF5733";
        return false;
    }
}

function addressVerify() {
    if (addressCheck()) {
        address.style.border = "1px solid #2E8B57";
        document.getElementById('address').style.color = "#2E8B57";
        document.getElementById('address_div').style.color = "#2E8B57";
        return true;
    } else if (!addressCheck()) {
        address.style.border = "1px solid #FF5733";
        document.getElementById('address').style.color = "#FF5733";
        document.getElementById('address_div').style.color = "#FF5733";
        return false;
    }
}

function cellNumberVerify() {
    if (cellCheck()) {
        cellNumber.style.border = "1px solid #2E8B57";
        document.getElementById('cellNumber').style.color = "#2E8B57";
        document.getElementById('cellNumber_div').style.color = "#2E8B57";
        return true;
    } else if (!cellCheck()) {
        cellNumber.style.border = "1px solid #FF5733";
        document.getElementById('cellNumber').style.color = "#FF5733";
        document.getElementById('cellNumber_div').style.color = "#FF5733";
        return false;
    }
}

function emailVerify() {
    if (emailCheck()) {
        email.style.border = "1px solid #2E8B57";
        document.getElementById('email').style.color = "#2E8B57";
        document.getElementById('email_div').style.color = "#2E8B57";
        return true;
    } else if (!emailCheck()) {
        email.style.border = "1px solid #FF5733";
        document.getElementById('email').style.color = "#FF5733";
        document.getElementById('email_div').style.color = "#FF5733";
        return false;
    }
}

function nationalityVerify() {
    if (nationalityCheck()) {
        nationality.style.border = "1px solid #2E8B57";
        document.getElementById('nationality').style.color = "#2E8B57";
        document.getElementById('nationality_div').style.color = "#2E8B57";
        return true;
    } else if (!nationalityCheck()) {
        nationality.style.border = "1px solid #FF5733";
        document.getElementById('nationality').style.color = "#FF5733";
        document.getElementById('nationality_div').style.color = "#FF5733";
        return false;
    }
}

function genderVerify() {
    if (genderCheck()) {
        gender.style.border = "1px solid #2E8B57";
        document.getElementById('gender').style.color = "#2E8B57";
        document.getElementById('gender_div').style.color = "#2E8B57";
        return true;
    } else if (!genderCheck()) {
        gender.style.border = "1px solid #FF5733";
        document.getElementById('gender').style.color = "#FF5733";
        document.getElementById('gender_div').style.color = "#FF5733";
        return false;
    }
}

function passwordsVerify() {
    if (passwordCheck()) {
        passwords.style.border = "1px solid #2E8B57";
        document.getElementById('passwords').style.color = "#2E8B57";
        document.getElementById('password_div').style.color = "#2E8B57";

        retypePassword.style.border = "1px solid #2E8B57";
        document.getElementById('retypePassword').style.color = "#2E8B57";
        document.getElementById('retypePassword_div').style.color = "#2E8B57";
        return true;
    } else if (!passwordCheck()) {
        passwords.style.border = "1px solid #FF5733";
        document.getElementById('passwords').style.color = "#FF5733";
        document.getElementById('password_div').style.color = "#FF5733";

        retypePassword.style.border = "1px solid #FF5733";
        document.getElementById('retypePassword').style.color = "#FF5733";
        document.getElementById('retypePassword_div').style.color = "#FF5733";
        return false;
    }
}

function submitVerify(){
    if(boolx){
        submit.style.border = "1px solid #EEF733";
        document.getElementById('submit').style.color = "#EEF733";
        document.getElementById('submit_div').style.color = "#EEF733";
    }else if(!boolx){
        submit.style.border = "1px solid #FF5733";
        document.getElementById('submit').style.color = "#FF5733";
        document.getElementById('submit_div').style.color = "#FF5733";
    }
    
}