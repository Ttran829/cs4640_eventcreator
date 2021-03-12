let setFocus = () => document.getElementById('full_name').focus();

function usernameVerify(){
    var form_name = document.getElementById('form_name');
    var full_name = document.getElementById('full_name').value;
    var user_msg = document.getElementById('user_msg');

    if(full_name != ""){
        form_name.classList.add('valid');
        form_name.classList.remove('invalid');
        user_msg.textContent = ""
        return true;
    }
    else{
        form_name.classList.remove('valid');
        form_name.classList.add('invalid');
        user_msg.textContent = "Please enter a name"
        user_msg.style.color ="#ff0000" 
        return false;
    }
}

function passwordVerify(){
    var form_password = document.getElementById('form_password');
    var upper = document.getElementById('upper');
    var lower = document.getElementById('lower');
    var number = document.getElementById('number');
    var length = document.getElementById('length');
    var password = document.getElementById('password').value;
    var text = document.getElementById('pass_msg');

    //Validate uppercase letter
    var upperCase = /[A-Z]/g;
    if(password.match(upperCase)){
        upper.classList.add('valid');
        upper.classList.remove('invalid');
        upper.style.color = "green";
    }
    else{
        upper.classList.remove('valid');
        upper.classList.add('invalid');
        //text.textContent = "Please Enter Valid UpperCase";
        upper.style.color = "#ff0000";
    }

    //Validate lowercase letter
    var lowerCase = /[a-z]/g;
    if(password.match(lowerCase)){
        lower.classList.add('valid');
        lower.classList.remove('invalid');
        lower.style.color = "green";
    }
    else{
        lower.classList.remove('valid');
        lower.classList.add('invalid');
        //text.textContent = "Please Enter Valid LowerCase";
        lower.style.color = "#ff0000";
    }

    //Validate number
    var numVal = /[0-9]/g;
    if(password.match(numVal)){
        number.classList.add('valid');
        number.classList.remove('invalid');
        number.style.color = "green";
    }
    else{
        number.classList.remove('valid');
        number.classList.add('invalid');
        //text.textContent = "Please Enter Valid Number";
        number.style.color = "#ff0000";
    }

    //Validate length
    if(password.length >= 6){
        length.classList.add('valid');
        length.classList.remove('invalid');
        length.style.color = "green";
    }
    else{
        length.classList.remove('valid');
        length.classList.add('invalid');
        //text.textContent = "Please Enter Valid Length";
        length.style.color = "#ff0000";
    }

    if (password == ""){
        upper.classList.remove("valid");
        upper.classList.remove("invalid");
        lower.classList.remove("valid");
        lower.classList.remove("invalid");
        number.classList.remove("valid");
        number.classList.remove("invalid");
        length.classList.remove("valid");
        length.classList.remove("invalid");
        form_password.classList.remove("valid");
        form_password.classList.remove("invalid");
        upper.style.color = "black";
        lower.style.color = "black";
        number.style.color = "black";
        length.style.color = "black";
        
    }

    if(length.classList == 'valid' && number.classList == 'valid' && lower.classList == 'valid' && upper.classList == 'valid'){
        form_password.classList.add('valid');
        form_password.classList.remove('invalid');
        text.textContent = "";
        return true;
    }
    else{
        form_password.classList.remove('valid');
        form_password.classList.add('invalid');
        return false;
    }


}

function confirmPasswordVerify(){
    var form_confirm = document.getElementById('form_confirm');
    var x = document.getElementById('password').value;
    var y = document.getElementById('confirm_password').value;
    var text = document.getElementById('confirm_msg');
    if (x == y && x != ""){
        //document.getElementById('password_message').innerHTML = "Passwords match";
        form_confirm.classList.add('valid');
        form_confirm.classList.remove('invalid');
        text.textContent = "";
        return true;

    }
    else{
        //document.getElementById('password_message').innerHTML = "Passwords do not match";
        form_confirm.classList.remove('valid');
        form_confirm.classList.add('invalid')
        text.textContent = "Passwords do not match";
        text.style.color = "red";
        return false;
    }

}

function emailVerify(){
    var form = document.getElementById('form_email');
    var email = document.getElementById('email').value;
    var text = document.getElementById('email_message');
    var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

    if (email == ""){
        form.classList.remove("valid");
        form.classList.remove("invalid");
        text.textContent = "";
        text.style.color = "#00ff00";
    }
    
    if (email.match(pattern)){
        form.classList.add("valid");
        form.classList.remove("invalid");
        text.textContent = "";
        //text.style.color = "#00ff00";
        return true;
    }
    else{
        form.classList.remove("valid");
        form.classList.add("invalid");
        text.textContent = "Please enter a valid email address";
        text.style.color = "#ff0000";
        return false;
        
    }
}

function formVerify(){
    var user_msg = document.getElementById('user_msg');
    var pass_msg = document.getElementById('pass_msg');
    var conpass_msg = document.getElementById('confirm_msg');
    var email_msg = document.getElementById('email_message');
    if (usernameVerify() == true && passwordVerify() == true && confirmPasswordVerify() == true && emailVerify() == true){
        window.location.href = "login.html";
    }
    else{
        if(usernameVerify() == false){
            user_msg.textContent = "Please enter a name";
            user_msg.style.color = "#ff0000";
        }
        if(passwordVerify() == false){
            pass_msg.textContent = "Please enter a valid password";
            pass_msg.style.color = "#ff0000";
        }
        if(confirmPasswordVerify() == false){
            conpass_msg.textContent = "Passwords do not match";
            conpass_msg.style.color = "#ff0000";
        }
        if(emailVerify() == false){
            email_msg.textContent = "Please enter a valid email address";
            email_msg.style.color = "#ff0000";
        }
    }
}