let loginform = document.getElementById("loginform");
let refistrationform = document.getElementById("registrationform");
let callregistration = document.getElementById("callregistration");
let calllogin = document.getElementById("calllogin");

callregistration.addEventListener('click', () =>{
	loginform.style.display = "none";
	refistrationform.style.display = "block";
	localStorage.setItem("activeform", "registration");
})
calllogin.addEventListener('click', () =>{
	loginform.style.display = "block";
	refistrationform.style.display = "none";
	localStorage.setItem("activeform", "login");
})

// retain page state
function retainstate() {
	// body...
     let newstate = localStorage.getItem("activeform");
     console.log(newstate);
     if (newstate == "login") {
     	loginform.style.display = "block";
	     refistrationform.style.display = "none";
      }else if(newstate == "registration"){
      loginform.style.display = "none";
	     refistrationform.style.display = "block";
      }else{
	     loginform.style.display = "block";
	     refistrationform.style.display = "none";
      }

}
retainstate();
