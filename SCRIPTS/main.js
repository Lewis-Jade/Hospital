const eyeOne = document.getElementById('eye-one');
const eyeTwo = document.getElementById('eye-two');

const password = document.getElementById('password');

const confirmPassword = document.getElementById('confirm-password');










eyeOne.onclick = function(){

   if(password.type == "password"){

      password.type = "text";
      eyeOne.src = "../IMG/eye.png";
   }else{
    password.type = "password";
    eyeOne.src = "../IMG/eyebrow.png";
   }


}


eyeTwo.onclick = function(){

  if(confirmPassword.type == "password"){

      confirmPassword.type = "text";
      eyeTwo.src = "../IMG/eye.png";

  }else{
      confirmPassword.type = "password";
      eyeTwo.src = "../IMG/eyebrow.png";
  }


  
}