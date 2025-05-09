function val() {

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
    if(!checkName){
        errorMsg.innerText="Username must be filled up and it can't be contain number or special character"
        return false
    }
    //check valid email
    if(!checkEmail){
        errorMsg.innerText="Give a valid email"
        return false
    }
    // password validation
    if(!checkPassword || password!==confirmed_password)
    {
        errorMsg.innerText="Password must 8 character and also contain minimum one number. Confirm password and password must be matched"
        return false
        
    }
    

      // age validation 
      if (isNaN(dateOfBirth)) {
      
         errorMsg.innerText="Please enter a valid date."
         return false
      }
  
      // Calculate 18 years ago from today
      const ageLimitDate = new Date();
      ageLimitDate.setFullYear(today.getFullYear() - 18);
  
      if (dateOfBirth > ageLimitDate) {
      errorMsg.innerText="You are under 18."
      return false
      }  

    
//    country validation
    if(country){
        console.log(country)
    }else{
         errorMsg.innerText="Please select a country"
         return false
    }
    // gender validation
    if(gender.value){
        console.log(gender.value)
    }else{
         errorMsg.innerText="Gender must be selected!!"
         return false
    }
    // terms and conditions checked
    
    if (!isChecked) {
     errorMsg.innerText="Please checked terms and conditions"
     return false
      
    } 


        return true;
    
    }