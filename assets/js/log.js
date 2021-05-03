const signUpButton = document.getElementById('goTo-signUp');
const signInButton = document.getElementById('goTo-logIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});



/******************** Log in **************************************/

var signInForm = document.getElementById("signInForm");
var phoneInput = document.getElementById("login-phone");
var passwordInput = document.getElementById("login-password");


signInForm.addEventListener('submit', (e) => {
	if (phoneInput.value === '' || phoneInput.value == NULL) {
		e.preventDefault();
		document.getElementById("phone-error").classList.remove("hidden");
	}
})

signInForm.addEventListener('submit', (e) => {
	if (passwordInput.value === '' || passwordInput.value == NULL) {
		e.preventDefault();
		document.getElementById("password-error").classList.remove("hidden");
	}
})


/******************** Sign in: parent **************************************/

/*
var formParent = document.getElementById("formParent");
var submitParentBtn = document.getElementById("submitParentBtn");
var pfName = document.getElementById('pfName');
var plName = document.getElementById('plName');
var parentPhone = document.getElementById('parentPhone');
var email = document.getElementById('email');
var city = document.getElementById('city');
var street = document.getElementById('street');
var house = document.getElementById('house');
var password = document.getElementById('password');

submitParentBtn.addEventListener('click', (e) => {
	if ((pfName.value === '' || pfName.value == NULL) || (plName.value === '' || plName.value == NULL)) {
		e.preventDefault();
		document.getElementById("name-error").classList.remove("hidden");
	}
})

submitParentBtn.addEventListener('click', (e) => {
	if (parentPhone.value === '' || parentPhone.value == NULL)  {
		e.preventDefault();
		document.getElementById("parentPhone-error").classList.remove("hidden");
	}
})

submitParentBtn.addEventListener('click', (e) => {
	if (email.value === '' || email.value == NULL)  {
		e.preventDefault();
		document.getElementById("email-error").classList.remove("hidden");
	}
})

submitParentBtn.addEventListener('click', (e) => {
	if ((city.value === '' || city.value == NULL)||(street.value === '' || street.value == NULL)||(house.value === '' || house.value == NULL))  {
		e.preventDefault();
		document.getElementById("address-error").classList.remove("hidden");
	}
})

submitParentBtn.addEventListener('click', (e) => {
	if (password.value === '' || password.value == NULL) {
		e.preventDefault();
		document.getElementById("password-error").classList.remove("hidden");
	}
})

*/

function passFormData(formID) {

	$.ajax ({
		type: "POST",
		url: "registrationComplete.php",
		data: $("#"+formID).serialize(),
		success: function(data) {
			console.log(data)
			}
		});
		submitParentData();
	}


function submitParentData() {
	document.getElementById("formParent").style.display = "none";
	document.getElementById("formStudent").style.display = "block";
}

var studentCounter = 0;

function addStudent(formID) {
	countStudents();
	var frm = document.getElementById('formStudent');
	var feedback = document.getElementById('studentFeedback');

	passFormData(formID);
	feedback.innerHTML = "החניך נרשם בהצלחה!";
	frm.reset();

	
	if(studentCounter > 0) {
		document.getElementById("cancelStudentbutton").style.display="block";
	}

}


function countStudents() {
	
	studentCounter++;
	document.getElementById("studentCounter").innerHTML = studentCounter;
}

function removeStudent(formID) {
	var frm = document.getElementById('formStudent');
	frm.reset();
	submitForm('formStudent');
}

var submitForm = document.getElementById("formStudent");

submitForm.addEventListener("submit", (e) =>  {
	e.preventDefault();
	const request = new XMLHttpRequest();
	request.open("post", "registrationComplete.php");
	request.onload = function () {
		console.log(request.responseText);
	}
	request.send(new FormData(submitForm));
	});

	document.getElementById("endSubmitBtn").addEventListener('click', () => {
		window.location.href = "registrationComplete.php";
	})


