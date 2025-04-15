document.getElementById('registration').addEventListener('click',function(e){
    const fullName = document.getElementById('fullname').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmed_password = document.getElementById('confirmed_password').value;
    const dateOfBirth = document.getElementById('dateOfBirth').value
    const checkName = /^[a-zA-Z]+$/.test(fullName);
    const checkEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email);
    const checkPassword = /^(?=.*\d).{8,}$/.test(password);
    const ageDiff = new Date().getFullYear - new Date(dateOfBirth).getFullYear
    // check name
    if(checkName){
        console.log(fullName)
    }else{
        alert("Username can't be contain number or special character")
    }
    //check valid email
    if(checkEmail){
        console.log(email,password,confirmed_password)
    }else{
        alert("Give a valid email")

    }
    // password validation
    if(!checkPassword || password!==confirmed_password)
    {
        alert("Password must 8 character and also contain minimum one number")
        
    }
    else{
        console.log(password)
    }

    // age validation 
      console.log(ageDiff)

})