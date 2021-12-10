const form = document.getElementById('Login');
const mail = document.getElementById('Email');
const pass = document.getElementById('Password');


function LoginValidation() {

    const Mail = mail.value;
    const Password = pass.value;

    if (Mail === '' && Password === '') {
        Empty(mail, 'Email cannot be blank');
        Empty(pass, 'Password cannot be blank');
        return false;

    } else if (Password !== '' && Mail === '') {
        Empty(mail, 'Email cannot be blank');
        NotEmpty(pass);
        return false;
    } else if (Password !== '' && !CheckMail(Mail)) {
        Empty(mail, 'Invalid Ashesi Mail');
        NotEmpty(pass);
        return false;

    } else if (!CheckMail(Mail) && Password === '') {
        Empty(mail, 'Invalid Ashesi mail');
        Empty(pass, 'Password cannot be blank');
        return false;
    } else if (Mail !== '' && Password === '') {
        NotEmpty(mail);
        Empty(pass, 'Password cannot be blank');
        return false;
    }

}


function Empty(input, message) {
    const FormDiv = input.parentElement;
    const small = FormDiv.querySelector('small');
    FormDiv.className = 'form-fill error';
    small.innerText = message;

}

function NotEmpty(input) {
    const LoginPage = input.parentElement;
    LoginPage.className = 'form-fill success';
}

function CheckMail(mail) {
    return /^[a-z]+\.[a-z]+@ashesi\.edu\.gh$/.test(mail);

}

