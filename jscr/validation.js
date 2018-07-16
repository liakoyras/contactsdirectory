function validation(){
            
	var letterNumber = /^[0-9a-zA-Z]+$/;
	var mail = /\S+@\S+\.\S+/;
	
	var userName = document.signup.login.value;
	var thePass = document.signup.password.value;
	var rePass = document.signup.passrep.value;
	var Email = document.signup.email.value;
	
	if(userName.length > 20){

		alert("Το όνομά χρήστη πρέπει να αποτελείται από λιγότερους από 20 χαρακτήρες.");
		return false;

	}
	
	if(userName.length < 5){

		alert("Το όνομά χρήστη πρέπει να αποτελείται από τουλάχιστον 5 χαρακτήρες.");
		return false;
		
	}
	
	if(!(userName.match(letterNumber))){
	   
	   alert("Το όνομά χρήστη πρέπει να αποτελείται μόνο από χαρακτήρες του λατινικού αλφαβήτου και αριθμούς.");
	   return false;
		
	}
	
	if(thePass.length < 8){

		alert("Ο κωδικός σας πρέπει να έχει τουλάχιστον 8 ψηφία.");
		return false;
		
	}
	
	if(thePass !== rePass){
		
		alert("Οι κωδικοί που πληκτρολογήσατε δεν ταιριάζουν μεταξύ τους.");
		return false;
		
	}
	
	if(!(Email.match(mail))){
		
		alert("Πρέπει να δώσετε μία έγκυρη διεύθυνση email.");
		return false;
		
	}
	
}