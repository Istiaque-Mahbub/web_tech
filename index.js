document.getElementById('registration').addEventListener('click',function(e){
    e.preventDefault();
    const fullName = document.getElementById('fullname').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmed_password = document.getElementById('confirmed_password').value;
    const dateOfBirth = new Date(document.getElementById('dateOfBirth').value)
    const checkName = /^[a-zA-Z]+$/.test(fullName);
    const checkEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email);
    const checkPassword = /^(?=.*\d).{8,}$/.test(password);
    const country = document.getElementById("country").value;
    const gender =document.querySelector('input[name="gender"]:checked');
    const isChecked = document.getElementById("terms").checked;
    const today = new Date();
    const errorMsg = document.getElementById('errorMsg');
    
  
    // check name
    if(checkName){
        console.log(fullName)
    }else{
       return errorMsg.innerText="Username must be filled up and it can't be contain number or special character"
    }
    //check valid email
    if(checkEmail){
        console.log(email,password,confirmed_password)
    }else{
       return errorMsg.innerText="Give a valid email"

    }
    // password validation
    if(!checkPassword || password!==confirmed_password)
    {
       return errorMsg.innerText="Password must 8 character and also contain minimum one number. Confirm password and password must be matched"
        
    }
    else{
        console.log(password)
    }

      // age validation 
      if (isNaN(dateOfBirth)) {
      
        return errorMsg.innerText="Please enter a valid date."
      }
  
      // Calculate 18 years ago from today
      const ageLimitDate = new Date();
      ageLimitDate.setFullYear(today.getFullYear() - 18);
  
      if (dateOfBirth > ageLimitDate) {
        return  errorMsg.innerText="You are under 18."
      }  

    
//    country validation
    if(country){
        console.log(country)
    }else{
        return errorMsg.innerText="Please select a country"
    }
    // gender validation
    if(gender.value){
        console.log(gender.value)
    }else{
        return errorMsg.innerText="Gender must be selected!!"
    }
    // terms and conditions checked
    
    if (!isChecked) {
        return errorMsg.innerText="Please checked terms and conditions"
      } 

    return errorMsg.innerText="Registration successful!!"
})