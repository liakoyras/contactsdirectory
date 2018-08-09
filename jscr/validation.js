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

function conVal(){
            
	var mail = /\S+@\S+\.\S+/;
	var digit = /\d/;
	
	var fname = document.newcon.fname.value;
	var lname = document.newcon.lname.value;
	var telephone = document.newcon.tel.value;
	var email = document.newcon.email.value;
	
	if(fname.length > 30){

		alert("Το όνομά πρέπει να αποτελείται από λιγότερους από 30 χαρακτήρες.");
		return false;

	}
	
	if(lname.length > 30){

		alert("Το επώνυμο πρέπει να αποτελείται από λιγότερους από 30 χαρακτήρες.");
		return false;

	}
	
	if(email.length > 30){
		
		alert("Το email πρέπει να περιέχει το πολύ 30 χαρακτήρες.");
		return false;		
		
	}
	
	if(email.length >= 1){
		
		if(!(email.match(mail))){
		
			alert("Πρέπει να δώσετε μία έγκυρη διεύθυνση email.");
			return false;
			
		}
		
	}
	
	if(!(telephone.match(digit))){
		
		alert("Το τηλέφωνο πρέπει να περιέχει αριθμούς.");
		return false;
		
	}
	
	if(telephone.length > 15){
		
		
		alert("Το τηλέφωνο πρέπει να περιέχει το πολύ 15 χαρακτήρες.");
		return false;
		
	}
	
	if(telephone.length > 40){
		
		
		alert("Η διεύθυνση πρέπει να περιέχει το πολύ 40 χαρακτήρες.");
		return false;
		
	}
		
}