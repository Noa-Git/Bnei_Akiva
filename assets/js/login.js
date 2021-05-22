var logInForm = document.getElementById("logInForm");
var phoneInput = document.getElementById("login-phone");
var passwordInput = document.getElementById("login-password");
var loginBtn = document.getElementById("loginBtn");

loginBtn.addEventListener('click', (e) => {

	if (phoneInput.value === '' || phoneInput.value == NULL) {
		document.getElementById("phone-error").classList.remove("hidden");
            e.preventDefault();
	}
})

loginBtn.addEventListener('click', (e) => {

	if (passwordInput.value === '' || passwordInput.value == NULL) {
		document.getElementById("password-error").classList.remove("hidden");
            e.preventDefault();
	}
})
