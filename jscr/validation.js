function validateUsername(){
	var letterNumber = /^[0-9a-zA-Z]+$/;
	var userName = document.signup.login;
	var userError = document.getElementById("unerror");
	
	if(userName.value.length < 5){
		if (getCookie('lang') == 'GR'){
			userError.innerHTML="  Το όνομά χρήστη πρέπει να αποτελείται από τουλάχιστον 5 χαρακτήρες.";
		}else{
			userError.innerHTML="  Your user name must be at least 5 characters long.";
		}
		userError.style.display="inline-block";
		userName.classList.add("invalid");
		return false;
	}else{
		userError.style.display="none";
		userName.classList.remove("invalid");
	}
	
	if(userName.value.length > 20){
		if (getCookie('lang') == 'GR'){
			userError.innerHTML="  Το όνομά χρήστη πρέπει να αποτελείται το πολύ από 20 χαρακτήρες.";
		}else{
			userError.innerHTML="  Your user name must be at most 20 characters long.";
		}
		userError.style.display="inline-block";
		userName.classList.add("invalid");
		return false;	
	}else{
		userError.style.display="none";
		userName.classList.remove("invalid");
	}

	if(!(userName.value.match(letterNumber))){
		if (getCookie('lang') == 'GR'){
			userError.innerHTML="  Το όνομα χρήστη πρέπει να περιέχει μόνο χαρακτήρες του λατινικού αλφαβήτου και αριθμούς.";
		}else{
			userError.innerHTML="  Your username must contain only alphanumeric characters.";
		}
		userError.style.display="inline-block";
		userName.classList.add("invalid");
		return false;
	}else{
		userError.style.display="none";
		userName.classList.remove("invalid");
	}
	
	return true;
}

function validatePasswords(){
	var thePass = document.signup.password;
	var rePass = document.signup.passrep;
	var passError = document.getElementById("passerror");
	
	if(thePass.value.length < 8){
		if (getCookie('lang') == 'GR'){
			passError.innerHTML="  Ο κωδικός σας πρέπει να έχει τουλάχιστον 8 χαρακτήρες.";
		}else{
			passError.innerHTML="  Your password needs to be at least 8 characters long.";
		}
		passError.style.display="inline-block";
		thePass.classList.add("invalid");
		rePass.classList.add("invalid");
		return false;
	}else{
		passError.style.display="none";
		thePass.classList.remove("invalid");
		rePass.classList.remove("invalid");
	}
	
	if(thePass.value !== rePass.value){
		if (getCookie('lang') == 'GR'){
			passError.innerHTML="  Οι κωδικοί που πληκτρολογήσατε δεν ταιριάζουν μεταξύ τους.";
		}else{
			passError.innerHTML="  The passwords do not match.";
		}
		passError.style.display="inline-block";
		thePass.classList.add("invalid");
		rePass.classList.add("invalid");
		return false;
	}else{
		passError.style.display="none";
		thePass.classList.remove("invalid");
		rePass.classList.remove("invalid");
	}
	return true;
}

function validateEmail(){
	var mail = /\S+@\S+\.\S+/;
	var Email = document.signup.email;
	var mailError = document.getElementById("mailerror");
	
	if(!(Email.value.match(mail))){
		if (getCookie('lang') == 'GR'){
			mailError.innerHTML="  Παρακαλούμε δώστε μια έγκυρη διεύθυνση email.";
		}else{
			mailError.innerHTML="  Please give a valid email address.";
		}
		mailError.style.display="inline-block";
		Email.classList.add("invalid");
		return false;
	}else{
		mailError.style.display="none";
		Email.classList.remove("invalid");
	}
	
	return true;
}


function validateUser(){
	
	var flag1 = validateUsername();
	var flag2 = validatePasswords();
	var flag3 = validateEmail();
	
    return(flag1 && flag2 && flag3);
}

function validateLogin(){
	var userName = document.login.username;
	var thePass = document.login.password;

	var flag1 = true;
	var flag2 = true;

	if(userName.value.length < 2){
		flag1 = false;
		userName.classList.add("invalid");
	}else{
		flag1 = true;
		userName.classList.remove("invalid");
	}

	if(thePass.value.length < 2){

		flag2 = false;
		thePass.classList.add("invalid");
	}else{
		flag2 = true;
		thePass.classList.remove("invalid");
	}
	return (flag1 && flag2);
}

function validateDelete(){
	var thePass = document.delete.password;
	
	if(thePass.value.length < 8){
		thePass.classList.add("invalid");
		document.activeElement.blur();
		return false;
	}else{
		thePass.classList.remove("invalid");
	}
	return true;
}


function validateContactFName(){
	var Fname = document.contact.fname;
	var fnameError = document.getElementById("fnameerror");
	
	if(Fname.value.length < 1){
		if (getCookie('lang') == 'GR'){
			fnameError.innerHTML="  Πρέπει να εισάγετε κάποιο όνομα για την επαφή σας.";
		}else{
			fnameError.innerHTML="  You must specify a name for your contact.";
		}
		fnameError.style.display="inline-block";
		Fname.classList.add("invalid");
		return false;
	}else{
		fnameError.style.display="none";
		Fname.classList.remove("invalid");
	}
	
	if(Fname.value.length > 100){
		if (getCookie('lang') == 'GR'){
			fnameError.innerHTML="  Το όνομα δεν πρέπει να ξεπερνά τους 100 χαρακτήρες.";
		}else{
			fnameError.innerHTML="  First Name must be less than 100 characters.";
		}
		fnameError.style.display="inline-block";
		Fname.classList.add("invalid");
		return false;
	}else{
		fnameError.style.display="none";
		Fname.classList.remove("invalid");
	}

	return true;
}

function validateContactLName(){
	var Lname = document.contact.lname;
	var lnameError = document.getElementById("lnameerror");
	if(Lname.value.length > 100){
		if (getCookie('lang') == 'GR'){
			lnameError.innerHTML="  Το επώνυμο δεν πρέπει να ξεπερνά τους 100 χαρακτήρες.";
		}else{
			lnameError.innerHTML="  Last Name must be less than 100 characters.";
		}
		lnameError.style.display="inline-block";
		Lname.classList.add("invalid");
		return false;
	}else{
		lnameError.style.display="none";
		Lname.classList.remove("invalid");
	}
	return true;
}

function validateContactAddress(){
	var Address = document.contact.address;
	var addressError = document.getElementById("addrerror");
	if(Address.value.length > 500){
		if (getCookie('lang') == 'GR'){
			addressError.innerHTML="  Η διεύθυνση δεν πρέπει να ξεπερνά τους 500 χαρακτήρες.";
		}else{
			addressError.innerHTML="  Address must be less than 500 characters.";
		}
		addressError.style.display="inline-block";
		Address.classList.add("invalid");
		return false;
	}else{
		addressError.style.display="none";
		Address.classList.remove("invalid");
	}
	return true;
}

function validateContactInfo(){
	var digit = /\d/;
	var mail = /\S+@\S+\.\S+/;
	
	var Telephone = document.contact.tel;
	var Email = document.contact.email;
	
	var telephoneError = document.getElementById("telerror");
	var mailError = document.getElementById("mailerror");
	
	if(Telephone.value == "" && Email.value != ""){
		if(Email.value.length > 100){
			if (getCookie('lang') == 'GR'){
				mailError.innerHTML="  Το email δεν πρέπει να ξεπερνά τους 100 χαρακτήρες.";
			}else{
				mailError.innerHTML="  Email must be less than 100 characters.";
			}
			mailError.style.display="inline-block";
			Email.classList.add("invalid");
			return false;
		}else{
			mailError.style.display="none";
			Email.classList.remove("invalid");
		}
		
		if(!(Email.value.match(mail))){
			if (getCookie('lang') == 'GR'){
				mailError.innerHTML="  Παρακαλούμε δώστε μια έγκυρη διεύθυνση email.";
			}else{
				mailError.innerHTML="  Please give a valid email address.";
			}
			mailError.style.display="inline-block";
			Email.classList.add("invalid");
			return false;
		}else{
			mailError.style.display="none";
			Email.classList.remove("invalid");
		}
		telephoneError.style.display="none";
		mailError.style.display="none";
		Telephone.classList.remove("invalid");
		Email.classList.remove("invalid");
		return true;
	}else if(Telephone.value != "" && Email.value == ""){
		if(Telephone.value.length > 20){
			if (getCookie('lang') == 'GR'){
				telephoneError.innerHTML="  Ο αριθμός τηλεφώνου δεν πρέπει να ξεπερνά τους 20 χαρακτήρες.";
			}else{
				telephoneError.innerHTML="  Telephone nubers must be less than 20 characters.";
			}
			telephoneError.style.display="inline-block";
			Telephone.classList.add("invalid");
			return false;
		}else{
			telephoneError.style.display="none";
			Telephone.classList.remove("invalid");
		}
		if(!(Telephone.value.match(digit))){
			if (getCookie('lang') == 'GR'){
				telephoneError.innerHTML="  Ο αριθμός τηλεφώνου πρέπει να περιέχει αριθμούς.";
			}else{
				telephoneError.innerHTML="  Telephone nubers must contain numerical digits.";
			}
			telephoneError.style.display="inline-block";
			Telephone.classList.add("invalid");
			return false;
		}else{
			telephoneError.style.display="none";
			Telephone.classList.remove("invalid");
		}
		telephoneError.style.display="none";
		mailError.style.display="none";
		Telephone.classList.remove("invalid");
		Email.classList.remove("invalid");
		return true;
	}else if(Telephone.value != "" && Email.value != ""){
		if(Email.value.length > 100){
			if (getCookie('lang') == 'GR'){
				mailError.innerHTML="  Το email δεν πρέπει να ξεπερνά τους 100 χαρακτήρες.";
			}else{
				mailError.innerHTML="  Email must be less than 100 characters.";
			}
			mailError.style.display="inline-block";
			Email.classList.add("invalid");
			return false;
		}else{
			mailError.style.display="none";
			Email.classList.remove("invalid");
		}
		if(!(Email.value.match(mail))){
			if (getCookie('lang') == 'GR'){
				mailError.innerHTML="  Παρακαλούμε δώστε μια έγκυρη διεύθυνση email.";
			}else{
				mailError.innerHTML="  Please give a valid email address.";
			}
			mailError.style.display="inline-block";
			Email.classList.add("invalid");
			return false;
		}else{
			mailError.style.display="none";
			Email.classList.remove("invalid");
		}
		if(Telephone.value.length > 20){
			if (getCookie('lang') == 'GR'){
				telephoneError.innerHTML="  Ο αριθμός τηλεφώνου δεν πρέπει να ξεπερνά τους 20 χαρακτήρες.";
			}else{
				telephoneError.innerHTML="  Telephone nubers must be less than 20 characters.";
			}
			telephoneError.style.display="inline-block";
			Telephone.classList.add("invalid");
			return false;
		}else{
			telephoneError.style.display="none";
			Telephone.classList.remove("invalid");
		}
		if(!(Telephone.value.match(digit))){
			if (getCookie('lang') == 'GR'){
				telephoneError.innerHTML="  Ο αριθμός τηλεφώνου πρέπει να περιέχει αριθμούς.";
			}else{
				telephoneError.innerHTML="  Telephone nubers must contain numerical digits.";
			}
			telephoneError.style.display="inline-block";
			Telephone.classList.add("invalid");
			return false;
		}else{
			telephoneError.style.display="none";
			Telephone.classList.remove("invalid");
		}
		telephoneError.style.display="none";
		mailError.style.display="none";
		Telephone.classList.remove("invalid");
		Email.classList.remove("invalid");
		return true;
	}else if(Telephone.value == "" && Email.value == ""){
		if (getCookie('lang') == 'GR'){
			telephoneError.innerHTML="  Πρέπει να εισάγετε το email ή τον αριθμό τηλεφώνου της επαφής.";
			mailError.innerHTML="  Πρέπει να εισάγετε το email ή τον αριθμό τηλεφώνου της επαφής.";
		}else{
			telephoneError.innerHTML="  You must enter either the contact's phone number or email address.";
			mailError.innerHTML="  You must enter either the contact's phone number or email address.";
		}
		telephoneError.style.display="inline-block";
		mailError.style.display="inline-block";
		Telephone.classList.add("invalid");
		Email.classList.add("invalid");
		return false;
	}
	telephoneError.style.display="none";
	mailError.style.display="none";
	Telephone.classList.remove("invalid");
	Email.classList.remove("invalid");
	return true;
}

function validateContact(){
	flag1 = validateContactFName();
	flag2 = validateContactLName();
	flag3 = validateContactAddress();
	flag4 = validateContactInfo();
	return (flag1 && flag2 && flag3 && flag4);
}