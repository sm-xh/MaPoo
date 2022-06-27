function validateEmail(email){
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
        return false;
    }
}

function validatePassword(pass){
    if (pass.length<8 || pass.length>=30){
        return false;
    }

}


function validateName(name){
    if (name == ""){
        return false;
    }
}

function validateForm() {
    const emailEl = document.querySelector('#email[input]').textContent;
    const passwordEl = document.querySelector('#password');
    const user_nameEl = document.querySelector('#user_name');

    if (!validateName(user_nameEl)){
        console.log(user_nameEl);
        document.querySelector('#mess').innerHTML = "Name must be filled out";
        return false;
    }
    if (!validatePassword(passwordEl)){
        document.querySelector('#mess').innerHTML = "Invalid password (must be between 8 and 30 characters";
        return false;
    }
    if (!validateEmail(emailEl)){
        document.querySelector('#mess').innerHTML = "Invalid email";
        return false;
    }
}



