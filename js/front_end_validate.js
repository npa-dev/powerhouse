const form = document.getElementById('form');
const fname = document.getElementById('fname');
const lname = document.getElementById('lname');
const email = document.getElementById('email');
const password = document.getElementById('password');
const cpassword = document.getElementById('cpassword');

form.addEventListener('submit', (e) => {
    e.preventDefault();

    checkInputs();
});

function checkInputs() {
    //get values from the inputs
    const fnameValue = fname.value.trim()
    const lnameValue = lname.value.trim()
    const emailValue = email.value.trim()
    const passwordValue = password.value.trim()
    const cpasswordValue = cpassword.value.trim()

    if (fnameValue === '') { // check if fname is empty
        //show error message
        setErrorFor(fname, 'First name cannot be blank');

    } else {
        //show success message
        setSuccessFor(fname);
    }

    if (lnameValue === '') { // check if lname is empty
        //show error message
        setErrorFor(lname, 'Last name cannot be blank');

    } else {
        //show success message
        setSuccessFor(lname);
    }

    if (emailValue === '') {
        //show error message
        setErrorFor(email, 'email cannot be blank');

    } else if (!isValidEmail(emailValue)) {
        setErrorFor(email, 'Enter a vaild ashesi email');

    } else {
        //show success message
        setSuccessFor(email);
    }

    if (passwordValue === '') { // check if password is empty
        //show error message
        setErrorFor(password, 'password cannot be blank');

    } else {
        //show success message
        setSuccessFor(password);
    }

    if (cpasswordValue === '') { // check if password is empty
        //show error message
        setErrorFor(cpassword, 'confirm password');

    } else if (passwordValue !== cpasswordValue) {
        setErrorFor(cpassword, 'Passwords do not match');

    } else {
        //show success message
        setSuccessFor(password);
    }


    function setErrorFor(input, message) {
        const inputBox = input.parentElement; //.input-box
        const small = inputBox.querySelector('small');
        small.innerText = message;
        inputBox.className = 'input-box error';

    }

    function setSuccessFor(input) {
        const inputBox = input.parentElement;
        inputBox.className = 'input-box success';
    }

    function isValidEmail(email) {
        const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (re.test(email)) {
            if (email.indexOf("@ashesi.edu.gh", email.length - "@ashesi.edu.gh".length) !== -1) {
                //VALID
                console.log("VALID");
            }
            return true;
        }
    }


}