document.getElementById('registration').addEventListener('click',function(e){
    const fullName = document.getElementById('fullname').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmed_password = document.getElementById('confirmed_password').value;
    const dateOfBirth = new Date(document.getElementById('dateOfBirth').value)
    const checkName = /^[a-zA-Z]+$/.test(fullName);
    const checkEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email);
    const checkPassword = /^(?=.*\d).{8,}$/.test(password);
    const country = document.getElementById("country").value;
    const gender =document.querySelector('input[name="gender"]:checked').value;
    const isChecked = document.getElementById("terms").checked;
    const today = new Date();

  
    // check name
    if(checkName){
        console.log(fullName)
    }else{
       return alert("Username must be filled up and it can't be contain number or special character")
    }
    //check valid email
    if(checkEmail){
        console.log(email,password,confirmed_password)
    }else{
       return alert("Give a valid email")

    }
    // password validation
    if(!checkPassword || password!==confirmed_password)
    {
       return alert("Password must 8 character and also contain minimum one number. Confirm password and password must be matched")
        
    }
    else{
        console.log(password)
    }

      // age validation 
      if (isNaN(dateOfBirth)) {
      
        return alert("Please enter a valid date.");
      }
  
      // Calculate 18 years ago from today
      const ageLimitDate = new Date();
      ageLimitDate.setFullYear(today.getFullYear() - 18);
  
      if (dateOfBirth > ageLimitDate) {
        return alert( "You are under 18.")
      } 

    
//    country validation
    if(country){
        console.log(country)
    }else{
        return alert("Please select a country")
    }
    // gender validation
    if(gender){
        console.log(gender)
    }else{
        return alert("Gender must be selected!!")
    }
    // terms and conditions checked
    
    if (!isChecked) {
        return alert("Please checked terms and conditions")
      } 

    return alert("Registration successful!!")
})