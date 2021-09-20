const form = document.getElementById('form');
const nip = document.getElementById('nip');
const nama = document.getElementById('nama');
const no_hp = document.getElementById('no_hp');
const email = document.getElementById('email');
const username = document.getElementById('username');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');

form.addEventListener('button', e => {
	e.preventDefault();
	
	checkInputs();
});

function checkInputs() {
	// trim to remove the whitespaces
	const nipValue = nip.value.trim();
	const namaValue = nama.value.trim();
	const no_hpValue = no_hp.value.trim();
	const emailValue = email.value.trim();
	const usernameValue = username.value.trim();
	const passwordValue = password.value.trim();
	const password2Value = password2.value.trim();

	if(nipValue === '') {
		setErrorFor(nip, 'nip cannot be blank');
	} else {
		setSuccessFor(nip);
	}

	if(namaValue === '') {
		setErrorFor(nama, 'nama cannot be blank');
	} else {
		setSuccessFor(nama);
	}

	if(no_hpValue === '') {
		setErrorFor(no_hp, 'no_hp cannot be blank');
	} else {
		setSuccessFor(no_hp);
	}
	
	if(usernameValue === '') {
		setErrorFor(username, 'Username cannot be blank');
	} else {
		setSuccessFor(username);
	}
	
	if(emailValue === '') {
		setErrorFor(email, 'Email cannot be blank');
	} else if (!isEmail(emailValue)) {
		setErrorFor(email, 'Not a valid email');
	} else {
		setSuccessFor(email);
	}
	
	if(passwordValue === '') {
		setErrorFor(password, 'Password cannot be blank');
	} else {
		setSuccessFor(password);
	}
	
	if(password2Value === '') {
		setErrorFor(password2, 'Password2 cannot be blank');
	} else if(passwordValue !== password2Value) {
		setErrorFor(password2, 'Passwords does not match');
	} else{
		setSuccessFor(password2);
	}
}

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-group error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-group success';
}
	
function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}













// SOCIAL PANEL JS
const floating_btn = document.querySelector('.floating-btn');
const close_btn = document.querySelector('.close-btn');
const social_panel_container = document.querySelector('.social-panel-container');

floating_btn.addEventListener('click', () => {
	social_panel_container.classList.toggle('visible')
});

close_btn.addEventListener('click', () => {
	social_panel_container.classList.remove('visible')
});