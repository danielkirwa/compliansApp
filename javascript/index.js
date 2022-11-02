let loginform = document.getElementById("loginform");
let refistrationform = document.getElementById("registrationform");
let callregistration = document.getElementById("callregistration");

callregistration.addEventListener('click', () =>{
	loginform.style.display = "none";
	refistrationform.style.display = "block";
})