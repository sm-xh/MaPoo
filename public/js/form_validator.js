function validateForm() {
    const emailEl = document.getElementById('email').value;
    const passwordEl = document.getElementById('password').value;
    const user_nameEl = document.getElementById('user_name').value;

    if (user_nameEl === ""){
        document.querySelector('#mess').innerHTML = "Name must be filled out";
        return false;
    }
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailEl)==false    ){
        document.querySelector('#mess').innerHTML = "Invalid email";
        return false;
    }
    if (passwordEl.length<8 || passwordEl.length>=30){
        document.querySelector('#mess').innerHTML = "Invalid password (must be between 8 and 30 characters";
        return false;
    }

}



