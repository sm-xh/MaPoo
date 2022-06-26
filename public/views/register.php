<?php
require_once __DIR__."/../../src/controllers/SiteContentController.php";
?>

<!DOCTYPE html>

<head>
    <?php include __DIR__."/../common/head.php"?>

    <link href="public/css/login.css" type="text/css" rel="stylesheet">
    <link href="public/css/register.css" type="text/css" rel="stylesheet">

    <script src="public/js/form-validator.js"></script>

    <title>Login Page</title>
</head>

<body>
<header>
    <?php
    SiteContentController::NavbarSelector();
    ?>
</header>

<main>
    <section>
        <div class="blurContainer"></div>

        <div class="login-container">
            <div class="messages">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <hr>
            <form class="register"  id="signup" action="register" method="POST">
                <p>name</p>
                <input name="name" id="user_name" type="text" placeholder="name">
                <p>email</p>
                <input name="email" id="email" type="text" placeholder="email@email.com">
                <p>password</p>
                <input name="password" id="password" type="password" placeholder="password">
                <button type="submit">Register</button>
            </form>
        </div>
    </section>
</main>
<script>const usernameEl = document.querySelector('#user_name');
    const emailEl = document.querySelector('#email');
    const passwordEl = document.querySelector('#password');

    const form = document.querySelector('#signup');

    // listener for the form
    form.addEventListener('submit', function (e) {
        // prevent the form from submitting
        e.preventDefault();

        // validate forms
        let isUsernameValid = checkUsername(),
            isEmailValid = checkEmail(),
            isPasswordValid = checkPassword(),
            isConfirmPasswordValid = checkConfirmPassword();

        let isFormValid = isUsernameValid &&
            isEmailValid &&
            isPasswordValid &&
            isConfirmPasswordValid;

        // submit to the server if the form is valid
        if (isFormValid) {

        }
    });

    // checks

    const isRequired = value => value === '' ? false : true;

    const isBetween = (length, min, max) => length < min || length > max ? false : true;

    const isEmailValid = (email) => {
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    };

    const isPasswordSecure = (password) => {
        const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
        return re.test(password);
    };

    // display info

    const showError = (input, message) => {
        // get the form-field element
        const formField = input.parentElement;
        // add the error class
        formField.classList.remove('success');
        formField.classList.add('error');

        // show the error message
        const error = formField.querySelector('small');
        error.textContent = message;
    };

    const formField = input.parentElement;

    const error = formField.querySelector('small');

    error.textContent = message;

    const showSuccess = (input) => {
        // get the form-field element
        const formField = input.parentElement;

        // remove the error class
        formField.classList.remove('error');
        formField.classList.add('success');

        // hide the error message
        const error = formField.querySelector('small');
        error.textContent = '';
    }

    // check classes

    const checkUsername = () => {

        let valid = false;
        const min = 3,
            max = 25;
        const username = usernameEl.value.trim();

        if (!isRequired(username)) {
            showError(usernameEl, 'Username cannot be blank.');
        } else if (!isBetween(username.length, min, max)) {
            showError(usernameEl, `Username must be between ${min} and ${max} characters.`)
        } else {
            showSuccess(usernameEl);
            valid = true;
        }
        return valid;
    }

    const checkEmail = () => {
        let valid = false;
        const email = emailEl.value.trim();
        if (!isRequired(email)) {
            showError(emailEl, 'Email cannot be blank.');
        } else if (!isEmailValid(email)) {
            showError(emailEl, 'Email is not valid.')
        } else {
            showSuccess(emailEl);
            valid = true;
        }
        return valid;
    }

    const checkPassword = () => {

        let valid = false;

        const password = passwordEl.value.trim();

        if (!isRequired(password)) {
            showError(passwordEl, 'Password cannot be blank.');
        } else if (!isPasswordSecure(password)) {
            showError(passwordEl, 'Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (!@#$%^&*)');
        } else {
            showSuccess(passwordEl);
            valid = true;
        }

        return valid;
    };


    form.addEventListener('submit', function (e) {
        // prevent the form from submitting
        e.preventDefault();

        // validate forms
        let isUsernameValid = checkUsername(),
            isEmailValid = checkEmail(),
            isPasswordValid = checkPassword(),
            isConfirmPasswordValid = checkConfirmPassword();

        let isFormValid = isUsernameValid &&
            isEmailValid &&
            isPasswordValid &&
            isConfirmPasswordValid;

        // submit to the server if the form is valid
        if (isFormValid) {

        }
    });</script>
</body>